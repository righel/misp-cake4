<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property array $passedArgs
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    private $passedArgs;

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);

        $this->set('metaGroup', 'Administration');
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

        $this->set('menuData', [
            'menuList' => 'admin',
            'menuItem' => 'indexUser',
        ]);

        $urlParams = "";
        $passedArgsArray = array();
        $booleanFields = array('autoalert', 'contactalert', 'termsaccepted', 'disabled');
        $textFields = array('role', 'email', 'all', 'authkey');
        $this->paginate['contain'] = ['Organisations', 'Roles'];
        // org admins can't see users of other orgs
        if ($this->_isSiteAdmin()) {
            $textFields[] = 'org';
        }
        $this->set('passedArgs', json_encode($this->request->getQueryParams(), JSON_FORCE_OBJECT));
        // check each of the passed arguments whether they're a filter (could also be a sort for example) and if yes, add it to the pagination conditions
        if ($this->request->getQuery('value') !== null) {
            $this->passedArgs['searchall'] = $this->request->getQuery('value');
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
                        $this->paginate['conditions'][] = array('Users.' . $searchTerm => $v);
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
                                    $this->paginate['conditions']['AND'][] = array('LOWER(Users.' . $searchTerm . ') NOT LIKE' => '%' . strtolower(substr($piece, 1)) . '%');
                                } elseif ($searchTerm == 'org') {
                                    $this->paginate['conditions']['AND'][] = array('Users.organisation_id !=' => substr($piece, 1));
                                } else {
                                    $this->paginate['conditions']['AND'][] = array('Users.' . $searchTerm => substr($piece, 1));
                                }
                            } else {
                                if ($searchTerm == 'email') {
                                    $test['OR'][] = array('LOWER(User.' . $searchTerm . ') LIKE' => '%' . strtolower($piece) . '%');
                                } elseif ($searchTerm == 'org') {
                                    $this->paginate['conditions']['OR'][] = array('Users.organisation_id' => $piece);
                                } elseif ($searchTerm == 'all') {
                                    $this->paginate['conditions']['AND'][] = array(
                                        'OR' => array(
                                            'UPPER(Users.email) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(Organisations.name) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(Roles.name) LIKE' => '%' . strtoupper($piece) . '%',
                                            'UPPER(Users.authkey) LIKE' => '%' . strtoupper($piece) . '%'
                                        ),
                                    );
                                } else {
                                    $test['OR'][] = array('Users.' . $searchTerm => $piece);
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
                $conditions['Users.organisation_id'] = $this->Auth->user('organisation_id');
            }
            $users = $this->User->find('all', array(
                'conditions' => $conditions,
                'recursive' => -1,
                'fields' => array(
                    'id',
                    'organisation_id',
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
                $conditions['Users.organisation_id'] = $this->Auth->user('organisation_id');
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
     * Filter User Index
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function filterUserIndex()
    {
        $passedArgsArray = array();
        $booleanFields = array('autoalert', 'contactalert', 'termsaccepted', 'disabled');
        $textFields = array('role', 'email');
        if (empty(Configure::read('Security.advanced_authkeys'))) {
            $textFields[] = 'authkey';
        }
        $showOrg = 0;
        // org admins can't see users of other orgs
        if ($this->_isSiteAdmin()) {
            $textFields[] = 'org';
            $showOrg = 1;
        }
        $this->set('differentFilters', $booleanFields);
        $this->set('simpleFilters', $textFields);
        $rules = array_merge($booleanFields, $textFields);
        $this->set('showorg', $showOrg);

        $filtering = array();
        foreach ($booleanFields as $b) {
            $filtering[$b] = '';
        }
        foreach ($textFields as $t) {
            $filtering[$t] = array('OR' => array(), 'NOT' => array());
        }

        foreach ($this->request->getQueryParams() as $k => $v) {
            if (substr($k, 0, 6) === 'search') {
                $searchTerm = substr($k, 6);
                if (in_array($searchTerm, $booleanFields)) {
                    $filtering[$searchTerm] = $v;
                } elseif (in_array($searchTerm, $textFields)) {
                    $pieces = explode('|', $v);
                    foreach ($pieces as $piece) {
                        if ($piece[0] == '!') {
                            $filtering[$searchTerm]['NOT'][] = substr($piece, 1);
                        } else {
                            $filtering[$searchTerm]['OR'][] = $piece;
                        }
                    }
                }
                $passedArgsArray[$searchTerm] = $v;
            }
        }
        $this->set('filtering', json_encode($filtering));

        $roles = $this->User->Roles->find('all', array('recursive' => -1));
        $roleNames = array();
        $roleJSON = array();
        foreach ($roles as $k => $v) {
            $roleNames[$v['id']] = $v['name'];
            $roleJSON[] = array('id' => $v['id'], 'value' => $v['name']);
        }
        if ($showOrg) {
            $orgs = $this->User->Organisations->find('list', array(
                'conditions' => array('local' => 1),
                'recursive' => -1,
                'fields' => array('id', 'name'),
                'order' => array('LOWER(name) ASC')
            ));
            $this->set('orgs', $orgs);
        }
        $this->set('roles', $roleNames);
        $this->set('roleJSON', json_encode($roleJSON));
        $rules = $this->_arrayToValuesIndexArray($rules);
        $this->set('rules', $rules);
        $this->set('baseurl', Configure::read('MISP.baseurl'));
        $this->layout = 'ajax';
    }
}
