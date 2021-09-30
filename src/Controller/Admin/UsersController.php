<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);

        $this->set('metaGroup', 'Administration');
        $this->set('menuData', [
            'menuList' => $this->_isSiteAdmin() ? 'admin' : 'globalActions',
            'menuItem' => 'authkeys_index',
        ]);
    }

    /**
     * Admin Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // TODO: [cakephp 2.x -> 4.x migration]
        // see: https://book.cakephp.org/3/en/orm/entities.html#creating-virtual-fields
        // $this->User->virtualFields['org_ci'] = 'UPPER(Organisation.name)';
        $urlParams = "";
        $passedArgsArray = array();
        $booleanFields = array('autoalert', 'contactalert', 'termsaccepted', 'disabled');
        $textFields = array('role', 'email', 'all', 'authkey');
        $this->paginate['contain'] = ['Organisations', 'Roles'];
        // org admins can't see users of other orgs
        if ($this->_isSiteAdmin()) {
            $textFields[] = 'org';
        }
        $this->set('passedArgs', json_encode($this->request->getQueryParams()));
        // check each of the passed arguments whether they're a filter (could also be a sort for example) and if yes, add it to the pagination conditions
        if (!empty($this->request->getQuery['value'])) {
            $this->passedArgs['searchall'] = $this->request->getQuery['value'];
        }
        foreach ($this->request->getQueryParams() as $k => $v) {
            if (substr($k, 0, 6) === 'search') {
                if ($v != "") {
                    if ($urlParams != "") {
                        $urlParams .= "/";
                    }
                    $urlParams .= $k . ":" . $v;
                }
                $searchTerm = substr($k, 6);
                if (in_array($searchTerm, $booleanFields)) {
                    if ($v != "") {
                        $this->paginate['conditions'][] = array('User.' . $searchTerm => $v);
                    }
                } elseif (in_array($searchTerm, $textFields)) {
                    if ($v != "") {
                        if ($searchTerm == "role") {
                            $searchTerm = "role_id";
                        }
                        $pieces = explode('|', $v);
                        $test = array();
                        foreach ($pieces as $piece) {
                            if ($piece[0] == '!') {
                                if ($searchTerm == 'email') {
                                    $this->paginate['conditions']['AND'][] = array('LOWER(User.' . $searchTerm . ') NOT LIKE' => '%' . strtolower(substr($piece, 1)) . '%');
                                } elseif ($searchTerm == 'org') {
                                    $this->paginate['conditions']['AND'][] = array('User.org_id !=' => substr($piece, 1));
                                } else {
                                    $this->paginate['conditions']['AND'][] = array('User.' . $searchTerm => substr($piece, 1));
                                }
                            } else {
                                if ($searchTerm == 'email') {
                                    $test['OR'][] = array('LOWER(User.' . $searchTerm . ') LIKE' => '%' . strtolower($piece) . '%');
                                } elseif ($searchTerm == 'org') {
                                    $this->paginate['conditions']['OR'][] = array('User.org_id' => $piece);
                                } elseif ($searchTerm == 'all') {
                                    $this->paginate['conditions']['AND'][] = array(
                                        'OR' => array(
                                            'UPPER(User.email) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(Organisation.name) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(Role.name) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(User.authkey) LIKE' => '%' . strtoupper($piece) . '%'
                                        ),
                                    );
                                } else {
                                    $test['OR'][] = array('User.' . $searchTerm => $piece);
                                }
                            }
                        }
                        if (!empty($test)) {
                            $this->paginate['conditions']['AND'][] = $test;
                        }
                    }
                }
                $passedArgsArray[$searchTerm] = $v;
            }
        }
        $redis = $this->User->setupRedis();
        if ($this->_isRest()) {
            $conditions = array();
            if (isset($this->paginate['conditions'])) {
                $conditions = $this->paginate['conditions'];
            }
            if (!$this->_isSiteAdmin()) {
                $conditions['User.org_id'] = $this->Auth->user('org_id');
            }
            $users = $this->User->find('all', array(
                'conditions' => $conditions,
                'recursive' => -1,
                'fields' => array(
                    'id',
                    'org_id',
                    'server_id',
                    'email',
                    'autoalert',
                    'authkey',
                    'invited_by',
                    'gpgkey',
                    'certif_public',
                    'nids_sid',
                    'termsaccepted',
                    'newsread',
                    'role_id',
                    'change_pw',
                    'contactalert',
                    'disabled',
                    'expiration',
                    'current_login',
                    'last_login',
                    'force_logout',
                    'date_created',
                    'date_modified'
                ),
                'contain' => array(
                    'Organisation' => array('id', 'name'),
                    'Role' => array('id', 'name', 'perm_auth', 'perm_site_admin')
                )
            ));
            foreach ($users as $key => $value) {
                if (empty($this->Auth->user('Role')['perm_site_admin'])) {
                    if ($value['Role']['perm_site_admin']) {
                        $users[$key]['User']['authkey'] = __('Redacted');
                    }
                } else if (!empty(Configure::read('Security.user_monitoring_enabled'))) {
                    $users[$key]['User']['monitored'] = $redis->sismember('misp:monitored_users', $value['User']['id']);
                }
                unset($users[$key]['User']['password']);
            }
            return $this->RestResponse->viewData($users, $this->response->type());
        } else {
            $this->set('urlparams', $urlParams);
            $this->set('passedArgsArray', $passedArgsArray);
            $conditions = array();
            if ($this->_isSiteAdmin()) {
                $users = $this->paginate();
                if (!empty(Configure::read('Security.user_monitoring_enabled'))) {
                    foreach ($users as $key => $value) {
                        $users[$key]['User']['monitored'] = $redis->sismember('misp:monitored_users', $users[$key]['User']['id']);
                    }
                }
                $this->set('users', $users);
            } else {
                $conditions['User.org_id'] = $this->Auth->user('org_id');
                $this->paginate['conditions']['AND'][] = $conditions;
                $users = $this->paginate();
                foreach ($users as $key => $value) {
                    if ($value['Role']['perm_site_admin']) {
                        $users[$key]['User']['authkey'] = __('Redacted');
                    }
                }
                $this->set('users', $users);
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Organisations', 'Roles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $organisations = $this->Users->Organisations->find('list', ['limit' => 200]);
        $servers = $this->Users->Servers->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'organisations', 'servers', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $organisations = $this->Users->Organisations->find('list', ['limit' => 200]);
        $servers = $this->Users->Servers->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'organisations', 'servers', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
