<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UserSettings Controller
 *
 * @property \App\Model\Table\UserSettingsTable $UserSettings
 * @method \App\Model\Entity\UserSetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSettingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $userSettings = $this->paginate($this->UserSettings);

        $this->set(compact('userSettings'));
    }

    /**
     * View method
     *
     * @param string|null $id User Setting id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSetting = $this->UserSettings->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('userSetting'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSetting = $this->UserSettings->newEmptyEntity();
        if ($this->request->is('post')) {
            $userSetting = $this->UserSettings->patchEntity($userSetting, $this->request->getData());
            if ($this->UserSettings->save($userSetting)) {
                $this->Flash->success(__('The user setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user setting could not be saved. Please, try again.'));
        }
        $users = $this->UserSettings->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSetting', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Setting id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSetting = $this->UserSettings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSetting = $this->UserSettings->patchEntity($userSetting, $this->request->getData());
            if ($this->UserSettings->save($userSetting)) {
                $this->Flash->success(__('The user setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user setting could not be saved. Please, try again.'));
        }
        $users = $this->UserSettings->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSetting', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Setting id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSetting = $this->UserSettings->get($id);
        if ($this->UserSettings->delete($userSetting)) {
            $this->Flash->success(__('The user setting has been deleted.'));
        } else {
            $this->Flash->error(__('The user setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
