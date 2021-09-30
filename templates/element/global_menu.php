<?php

declare(strict_types=1);

use Cake\Core\Configure;

if (!empty($me)) {
    // New approach how to define menu requirements. It takes ACLs from ACLComponent.
    // TODO: Use for every menu item
    $canAccess = function ($controller, $action) use ($me, $aclComponent) {
        return $aclComponent->canUserAccess($me, $controller, $action);
    };

    $menu = array(
        array(
            'type' => 'root',
            'url' => empty($homepage['path']) ? '/' : h($homepage['path']),
            'html' => Configure::read('MISP.home_logo') ? '<img src="' . '/img/custom/' . Configure::read('MISP.home_logo') . '" style="height:24px;" alt="' . __('Home') . '">' : __('Home'),
        ),
        array(
            'type' => 'root',
            'text' => __('Event Actions'),
            'children' => array(
                array(
                    'text' => __('List Events'),
                    'url' => '/events/index'
                ),
                array(
                    'text' => __('Add Event'),
                    'url' => '/events/add',
                    'requirement' => $isAclAdd
                ),
                array(
                    'text' => __('List Attributes'),
                    'url' => '/attributes/index'
                ),
                array(
                    'text' => __('Search Attributes'),
                    'url' => '/attributes/search'
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('View Proposals'),
                    'url' => '/shadow_attributes/index/all:0'
                ),
                array(
                    'text' => __('Events with proposals'),
                    'url' => '/events/proposalEventIndex'
                ),
                array(
                    'url' => '/event_delegations/index/context:pending',
                    'text' => __('View delegation requests'),
                    'requirement' => $canAccess('event_delegations', 'index'),
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Tags'),
                    'url' => '/tags/index'
                ),
                array(
                    'text' => __('List Tag Collections'),
                    'url' => '/tag_collections/index'
                ),
                array(
                    'text' => __('Add Tag'),
                    'url' => '/tags/add',
                    'requirement' => $isAclTagEditor
                ),
                array(
                    'text' => __('List Taxonomies'),
                    'url' => '/taxonomies/index'
                ),
                array(
                    'text' => __('List Templates'),
                    'url' => '/templates/index'
                ),
                array(
                    'text' => __('Add Template'),
                    'url' => '/templates/add',
                    'requirement' => $isAclTemplate
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('Export'),
                    'url' => '/events/export'
                ),
                array(
                    'text' => __('Automation'),
                    'url' => '/events/automation',
                    'requirement' => $isAclAuth
                ),
                array(
                    'type' => 'separator',
                    'requirement' =>
                    Configure::read('MISP.enableEventBlocklisting') !== false &&
                        !$isSiteAdmin &&
                        $hostOrgUser
                ),
                array(
                    'text' => __('Blocklist Event'),
                    'url' => '/eventBlocklists/add',
                    'requirement' =>
                    Configure::read('MISP.enableEventBlocklisting') !== false &&
                        !$isSiteAdmin && $hostOrgUser
                ),
                array(
                    'text' => __('Manage Event Blocklists'),
                    'url' => '/eventBlocklists',
                    'requirement' =>
                    Configure::read('MISP.enableEventBlocklisting') !== false &&
                        !$isSiteAdmin && $hostOrgUser
                )
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Dashboard'),
            'url' => '/dashboards'
        ),
        array(
            'type' => 'root',
            'text' => __('Galaxies'),
            'url' => '/galaxies/index',
            'children' => array(
                array(
                    'text' => __('List Galaxies'),
                    'url' => '/galaxies/index'
                ),
                array(
                    'text' => __('List Relationships'),
                    'url' => '/galaxy_cluster_relations/index'
                ),
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Input Filters'),
            'children' => array(
                array(
                    'text' => __('Import Regexp'),
                    'url' => '/admin/regexp/index',
                    'requirement' => $isAclRegexp
                ),
                array(
                    'text' => __('Import Regexp'),
                    'url' => '/regexp/index',
                    'requirement' => !$isAclRegexp
                ),
                array(
                    'text' => __('Signature Allowedlist'),
                    'url' => '/admin/allowedlists/index',
                    'requirement' => $isAclRegexp
                ),
                array(
                    'text' => __('Signature Allowedlist'),
                    'url' => '/allowedlists/index',
                    'requirement' => !$isAclRegexp
                ),
                array(
                    'text' => __('Warninglists'),
                    'url' => '/warninglists/index'
                ),
                array(
                    'text' => __('Noticelists'),
                    'url' => '/noticelists/index'
                ),
                array(
                    'text' => __('Correlation Exclusions'),
                    'url' => '/correlation_exclusions/index',
                    'requirement' => $canAccess('correlation_exclusions', 'index'),
                )
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Global Actions'),
            'children' => array(
                array(
                    'text' => __('News'),
                    'url' => '/news'
                ),
                array(
                    'text' => __('My Profile'),
                    'url' => '/users/view/me'
                ),
                array(
                    'text' => __('My Settings'),
                    'url' => '/user_settings/index/user_id:me'
                ),
                array(
                    'text' => __('Set Setting'),
                    'url' => '/user_settings/setSetting'
                ),
                array(
                    'text' => __('Organisations'),
                    'url' => '/organisations/index',
                    'requirement' => $isAclSharingGroup || empty(Configure::read('Security.hide_organisation_index_from_users'))
                ),
                array(
                    'text' => __('Role Permissions'),
                    'url' => '/roles/index'
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Object Templates'),
                    'url' => '/objectTemplates/index'
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Sharing Groups'),
                    'url' => '/sharing_groups/index'
                ),
                array(
                    'text' => __('Add Sharing Group'),
                    'url' => '/sharing_groups/add',
                    'requirement' => $isAclSharingGroup
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('Decaying Models Tool'),
                    'url' => '/decayingModel/decayingTool',
                    'requirement' => $isAdmin
                ),
                array(
                    'text' => __('List Decaying Models'),
                    'url' => '/decayingModel/index',
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('User Guide'),
                    'url' => 'https://www.circl.lu/doc/misp/'
                ),
                array(
                    'text' => __('Categories & Types'),
                    'url' => '/pages/display/doc/categories_and_types'
                ),
                array(
                    'text' => __('Terms & Conditions'),
                    'url' => '/users/terms'
                ),
                array(
                    'text' => __('Statistics'),
                    'url' => '/users/statistics'
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Discussions'),
                    'url' => '/threads/index'
                ),
                array(
                    'text' => __('Start Discussion'),
                    'url' => '/posts/add'
                )
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Sync Actions'),
            'requirement' =>  $isAclSync || $isAdmin || $hostOrgUser,
            'children' => array(
                array(
                    'text' => __('Create Sync Config'),
                    'url' => '/servers/createSync',
                    'requirement' => $isAclSync && !$isSiteAdmin
                ),
                array(
                    'text' => __('Import Server Settings'),
                    'url' => '/servers/import',
                    'requirement' => $canAccess('servers', 'import'),
                ),
                array(
                    'text' => __('List Servers'),
                    'url' => '/servers/index',
                    'requirement' => $canAccess('servers', 'index'),
                ),
                array(
                    'text' => __('List Feeds'),
                    'url' => '/feeds/index',
                    'requirement' => $canAccess('feeds', 'index'),
                ),
                array(
                    'text' => __('Search Feed Caches'),
                    'url' => '/feeds/searchCaches',
                    'requirement' => $canAccess('feeds', 'searchCaches'),
                ),
                array(
                    'text' => __('List SightingDB Connections'),
                    'url' => '/sightingdb/index',
                    'requirement' => $canAccess('sightingdb', 'index'),
                ),
                array(
                    'text' => __('Add SightingDB Connection'),
                    'url' => '/sightingdb/add',
                    'requirement' => $canAccess('sightingdb', 'add'),
                ),
                array(
                    'text' => __('List Communities'),
                    'url' => '/communities/index',
                    'requirement' => $canAccess('communities', 'index'),
                ),
                array(
                    'text' => __('Cerebrates'),
                    'url' => '/cerebrates/index',
                    'requirement' => $canAccess('cerebrates', 'index'),
                ),
                array(
                    'text' => __('Event ID translator'),
                    'url' => '/servers/idTranslator',
                    'requirement' => $canAccess('servers', 'idTranslator')
                )
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Administration'),
            'url' => '/servers/serverSettings',
            'requirement' => $isAdmin,
            'children' => array(
                array(
                    'text' => __('List Users'),
                    'url' => '/admin/users/index'
                ),
                array(
                    'text' => __('List Auth Keys'),
                    'url' => '/auth_keys/index'
                ),
                array(
                    'text' => __('List User Settings'),
                    'url' => '/user_settings/index/user_id:all'
                ),
                array(
                    'text' => __('Set User Setting'),
                    'url' => '/user_settings/setSetting'
                ),
                array(
                    'text' => __('Add User'),
                    'url' => '/admin/users/add',
                    'requirement' => $canAccess('users', 'admin_add'),
                ),
                array(
                    'text' => __('Contact Users'),
                    'url' => '/admin/users/email'
                ),
                array(
                    'text' => __('User Registrations'),
                    'url' => '/users/registrations',
                    'requirement' => $canAccess('users', 'registrations'),
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Organisations'),
                    'url' => '/organisations/index'
                ),
                array(
                    'text' => __('Add Organisations'),
                    'url' => '/admin/organisations/add',
                    'requirement' => $canAccess('organisations', 'admin_add'),
                ),
                array(
                    'type' => 'separator'
                ),
                array(
                    'text' => __('List Roles'),
                    'url' => '/roles/index'
                ),
                array(
                    'text' => __('Add Roles'),
                    'url' => '/admin/roles/add',
                    'requirement' => $isSiteAdmin
                ),
                array(
                    'type' => 'separator',
                    'requirement' => $isSiteAdmin,
                ),
                array(
                    'text' => __('Server Settings & Maintenance'),
                    'url' => '/servers/serverSettings',
                    'requirement' => $isSiteAdmin
                ),
                array(
                    'type' => 'separator',
                    'requirement' => Configure::read('MISP.background_jobs') && $isSiteAdmin
                ),
                array(
                    'text' => __('Jobs'),
                    'url' => '/jobs/index',
                    'requirement' => Configure::read('MISP.background_jobs') && $isSiteAdmin
                ),
                array(
                    'type' => 'separator',
                    'requirement' => Configure::read('MISP.background_jobs') && $isSiteAdmin
                ),
                array(
                    'text' => __('Scheduled Tasks'),
                    'url' => '/tasks',
                    'requirement' => Configure::read('MISP.background_jobs') && $isSiteAdmin
                ),
                array(
                    'text' => __('Event Block Rules'),
                    'url' => '/servers/eventBlockRule',
                    'requirement' => $isSiteAdmin
                ),
                array(
                    'type' => 'separator',
                    'requirement' => Configure::read('MISP.enableEventBlocklisting') !== false && $isSiteAdmin
                ),
                array(
                    'text' => __('Blocklist Event'),
                    'url' => '/eventBlocklists/add',
                    'requirement' => Configure::read('MISP.enableEventBlocklisting') !== false && $isSiteAdmin
                ),
                array(
                    'text' => __('Manage Event Blocklists'),
                    'url' => '/eventBlocklists',
                    'requirement' => Configure::read('MISP.enableEventBlocklisting') !== false && $isSiteAdmin
                ),
                array(
                    'type' => 'separator',
                    'requirement' => Configure::read('MISP.enableEventBlocklisting') !== false && $isSiteAdmin
                ),
                array(
                    'text' => __('Blocklist Organisation'),
                    'url' => '/orgBlocklists/add',
                    'requirement' => Configure::read('MISP.enableOrgBlocklisting') !== false && $isSiteAdmin
                ),
                array(
                    'text' => __('Manage Org Blocklists'),
                    'url' => '/orgBlocklists',
                    'requirement' => Configure::read('MISP.enableOrgBlocklisting') !== false && $isSiteAdmin
                ),
                [
                    'type' => 'separator',
                    'requirement' => $isSiteAdmin
                ],
                [
                    'text' => __('Top Correlations'),
                    'url' => '/correlations/top',
                    'requirement' => $isSiteAdmin
                ]
            )
        ),
        array(
            'type' => 'root',
            'text' => __('Logs'),
            'requirement' => $isAclAudit,
            'children' => array(
                array(
                    'text' => __('List Logs'),
                    'url' => '/admin/logs/index'
                ),
                array(
                    'text' => __('List Audit Logs'),
                    'url' => '/admin/audit_logs/index',
                    'requirement' => Configure::read('MISP.log_new_audit'),
                ),
                array(
                    'text' => __('Search Logs'),
                    'url' => '/admin/logs/search'
                )
            )
        ),
        array(
            'type' => 'root',
            'text' => __('API'),
            'children' => array(
                array(
                    'text' => __('OpenAPI'),
                    'url' => '/servers/openapi'
                ),
                array(
                    'text' => __('REST client'),
                    'url' => '/servers/rest',
                    'requirement' => $canAccess('servers', 'rest')
                )
            )
        )
    );
    $menu_right = array(
        array(
            'type' => 'root',
            'url' => '#',
            'html' => sprintf(
                '<span id="setHomePage" title="%s" role="img" aria-label="%s" data-current-page="%s"><i class="fa fa-star %s"></i></span>',
                __('Set the current page as your home page in MISP'),
                __('Set the current page as your home page in MISP'),
                h($this->request->getAttribute('here')),
                (!empty($homepage['path']) && $homepage['path'] === $this->request->getAttribute('here')) ? 'orange' : ''
            )
        ),
        array(
            'type' => 'root',
            'url' => empty($homepage['path']) ? $baseurl : h($homepage['path']),
            'html' => '<span class="logoBlueStatic bold" id="smallLogo">MISP</span>'
        ),
        array(
            'type' => 'root',
            'url' => '/dashboards',
            'html' => sprintf(
                '<span class="white" title="%s">%s%s&nbsp;&nbsp;&nbsp;%s</span>',
                h($me['email']),
                $this->UserName->prepend($me['email']),
                h($loggedInUserName),
                isset($notifications) ? sprintf(
                    '<i class="fa fa-envelope %s" role="img" aria-label="%s"></i>',
                    (($notifications['total'] == 0) ? 'white' : 'red'),
                    __('Notifications') . ': ' . $notifications['total']
                ) : ''
            )
        ),
        array(
            'url' => '/users/logout',
            'text' => __('Log out'),
            'requirement' => empty(Configure::read('Plugin.CustomAuth_disable_logout'))
        )
    );
}
?>
<nav id="topBar" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                if (isset($menu)) {
                    foreach ($menu as $root_element) {
                        echo $this->element('/genericElements/GlobalMenu/global_menu_root', array('data' => $root_element));
                    }
                }
                ?>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                if (isset($menu_right)) {
                    foreach ($menu_right as $root_element) {
                        echo $this->element('/genericElements/GlobalMenu/global_menu_root', array('data' => $root_element));
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</nav>