<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property array $filterFields
 * @property array $quickFilterFields
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $filterFields = ['email', 'disabled'];
    public $quickFilterFields = [['email' => true]];

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

        $this->CRUD->index([
            'filters' => $this->filterFields,
            'quickFilters' => $this->quickFilterFields,
            'filterFunction' => function ($query) {
                if (!$this->_isSiteAdmin()) {
                    $query->where(['Users.organisation_id' => $this->ACL->getUser()->organisation_id]);
                }

                return $query;
            },
        ]);

        $responsePayload = $this->CRUD->getResponsePayload();

        if (!empty($responsePayload)) {
            return $responsePayload;
        }
    }
}
