<?php

declare(strict_types=1);

use Cake\Core\Configure;

$multiSelectField = array();
if (!$this->request->is('ajax')) {
    // Allow reset Keys, filtering and searching if viewing the /users/index page
    echo '<div class="index">';
    $description = __(
        'Click {0} to reset the API keys of all sync and org admin users in one shot. This will also automatically inform them of their new API keys.',
        $this->Form->postLink(
            __('here'),
            '/users/resetAllSyncAuthKeys',
            array(
                'title' => __('Reset all sync user API keys'),
                'aria-label' => __('Reset all sync user API keys'),
                'class' => 'bold'
            ),
            __('Are you sure you wish to reset the API keys of all users with sync privileges?')
        )
    );
    $topBar = array(
        'children' => array(
            array(
                'children' => array(
                    array(
                        'class' => 'hidden mass-select',
                        'text' => __('Disable selected users'),
                        'onClick' => "multiSelectToggleField",
                        'onClickParams' => array('admin/users', 'massToggleField', 'disabled', '1')
                    ),
                    array(
                        'class' => 'hidden mass-select',
                        'text' => __('Enable selected users'),
                        'onClick' => "multiSelectToggleField",
                        'onClickParams' => array('admin/users', 'massToggleField', 'disabled', '0')
                    ),
                    array(
                        'class' => 'hidden mass-select',
                        'text' => __('Disable publish emailing'),
                        'onClick' => "multiSelectToggleField",
                        'onClickParams' => array('admin/users', 'massToggleField', 'autoalert', '0')
                    ),
                    array(
                        'class' => 'hidden mass-select',
                        'text' => __('Enable publish emailing'),
                        'onClick' => "multiSelectToggleField",
                        'onClickParams' => array('admin/users', 'massToggleField', 'autoalert', '1')
                    ),
                )
            ),
            array(
                'type' => 'simple',
                'children' => array(
                    array(
                        'id' => 'search-button',
                        'title' => __('Modify filters'),
                        'fa-icon' => 'search',
                        'onClick' => 'getPopup',
                        'onClickParams' => array($urlparams, 'admin/users', 'filterUserIndex')
                    )
                )
            ),
            array(
                'type' => 'simple',
                'children' => array(
                    array(
                        'url' => '/admin/users/index',
                        'text' => __('All'),
                        'active' => !isset($passedArgsArray['disabled'])
                    ),
                    array(
                        'url' => '/admin/users/index/searchdisabled:0',
                        'text' => __('Active'),
                        'active' => isset($passedArgsArray['disabled']) && $passedArgsArray['disabled'] === "0"
                    ),
                    array(
                        'url' => '/admin/users/index/searchdisabled:1',
                        'text' => __('Disabled'),
                        'active' => isset($passedArgsArray['disabled']) && $passedArgsArray['disabled'] === "1"
                    )
                )
            ),
            array(
                'type' => 'search',
                'button' => __('Filter'),
                'placeholder' => __('Enter value to search'),
                'searchKey' => 'value',
            )
        )
    );
    $multiSelectField = array(array(
        'element' => 'selector',
        'class' => 'short',
        'data' => array(
            'id' => array(
                'value_path' => 'User.id'
            )
        )
    ));
} else {
    $description = '';
    $topBar = [];
}
echo $this->element('/genericElements/IndexTable/index_table', array(
    'data' => array(
        'data' => $users,
        'top_bar' => $topBar,
        'fields' => array_merge(
            $multiSelectField,
            array(
                array(
                    'name' => __('ID'),
                    'sort' => 'id',
                    'class' => 'short',
                    'data_path' => 'id'
                ),
                array(
                    'name' => __('Org'),
                    'sort' => 'organisation_id',
                    'element' => 'org',
                    'data_path' => 'organisation'
                ),
                array(
                    'name' => __('Role'),
                    'sort' => 'role_id',
                    'class' => 'short',
                    'element' => 'role',
                    'data_path' => 'role'
                ),
                array(
                    'name' => __('Email'),
                    'sort' => 'email',
                    'data_path' => 'email'
                ),
                array(
                    'name' => __('Authkey'),
                    'sort' => 'authkey',
                    'class' => 'bold quickSelect',
                    'data_path' => 'authkey',
                    'privacy' => 1,
                    'requirement' => empty(Configure::read('Security.advanced_authkeys'))
                ),
                array(
                    'name' => __('Event alert'),
                    'element' => 'boolean',
                    'sort' => 'autoalert',
                    'class' => 'short',
                    'data_path' => 'autoalert'
                ),
                array(
                    'name' => __('Contact alert'),
                    'element' => 'boolean',
                    'sort' => 'User.contactalert',
                    'class' => 'short',
                    'data_path' => 'User.contactalert'
                ),
                array(
                    'name' => __('PGP Key'),
                    'element' => 'boolean',
                    'sort' => 'User.gpgkey',
                    'class' => 'short',
                    'data_path' => 'User.gpgkey'
                ),
                array(
                    'name' => __('S/MIME'),
                    'element' => 'boolean',
                    'sort' => 'certif_public',
                    'class' => 'short',
                    'data_path' => 'certif_public',
                    'requirement' => Configure::read('SMIME.enabled')
                ),
                array(
                    'name' => __('NIDS SID'),
                    'sort' => 'nids_sid',
                    'class' => 'short',
                    'data_path' => 'nids_sid'
                ),
                array(
                    'name' => __('Terms Accepted'),
                    'element' => 'boolean',
                    'sort' => 'termsaccepted',
                    'class' => 'short',
                    'data_path' => 'termsaccepted'
                ),
                array(
                    'name' => __('Last Login'),
                    'sort' => 'current_login',
                    'element' => 'datetime',
                    'empty' => __('Never'),
                    'class' => 'short',
                    'data_path' => 'current_login'
                ),
                array(
                    'name' => __('Created'),
                    'sort' => 'date_created',
                    'element' => 'datetime',
                    'class' => 'short',
                    'data_path' => 'date_created'
                ),
                array(
                    'name' => (Configure::read('Plugin.CustomAuth_name') ? Configure::read('Plugin.CustomAuth_name') : __('External Auth')),
                    'sort' => 'external_auth_required',
                    'element' => 'boolean',
                    'class' => 'short',
                    'data_path' => 'external_auth_required',
                    'requirement' => (Configure::read('Plugin.CustomAuth_enable') && empty(Configure::read('Plugin.CustomAuth_required')))
                ),
                array(
                    'name' => __('Monitored'),
                    'element' => 'toggle',
                    'url' => '/admin/users/monitor',
                    'url_params_data_paths' => array(
                        'id'
                    ),
                    'sort' => 'User.disabled',
                    'class' => 'short',
                    'data_path' => 'monitored',
                    'requirement' => $isSiteAdmin && Configure::read('Security.user_monitoring_enabled')
                ),
                array(
                    'name' => __('Disabled'),
                    'element' => 'boolean',
                    'sort' => 'disabled',
                    'class' => 'short',
                    'data_path' => 'disabled'
                )
            )
        ),
        'title' => __('Users index'),
        'html' => $description,
        'actions' => array(
            array(
                'icon' => 'sync',
                'onclick' => 'initiatePasswordReset(\'[onclick_params_data_path]\');',
                'onclick_params_data_path' => 'id',
                'title' => __('Create new credentials and inform user'),
                'complex_requirement' => array(
                    'options' => array(
                        'datapath' => array('organisation_id'),
                        'me' => $me,
                        'isSiteAdmin' => $isSiteAdmin
                    ),
                    'function' => function ($user, $options) {
                        return (
                            ($options['me']->role->perm_admin &&
                                ($user->organisation_id == $options['me']->organisation_id)) ||
                            $options['isSiteAdmin']);
                    }
                )
            ),
            array(
                'url' => '/admin/users/edit',
                'url_params_data_paths' => array(
                    'id'
                ),
                'icon' => 'edit',
                'title' => __('Edit')
            ),
            array(
                'url' => '/admin/users/delete',
                'url_params_data_paths' => array(
                    'id'
                ),
                'postLink' => 1,
                'postLinkConfirm' => __('Are you sure you want to delete the user? It is highly recommended to never delete users but to disable them instead.'),
                'icon' => 'trash',
                'title' => __('Delete')
            ),
            array(
                'url' => '/admin/users/view',
                'url_params_data_paths' => array(
                    'id'
                ),
                'icon' => 'eye',
                'title' => __('View'),
                'dbclickAction' => true,
            )
        )
    )
));
