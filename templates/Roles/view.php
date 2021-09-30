<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles view content">
            <h3><?= h($role->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($role->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Memory Limit') ?></th>
                    <td><?= h($role->memory_limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Max Execution Time') ?></th>
                    <td><?= h($role->max_execution_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rate Limit Count') ?></th>
                    <td><?= $this->Number->format($role->rate_limit_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($role->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($role->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Add') ?></th>
                    <td><?= $role->perm_add ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Modify') ?></th>
                    <td><?= $role->perm_modify ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Modify Org') ?></th>
                    <td><?= $role->perm_modify_org ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Publish') ?></th>
                    <td><?= $role->perm_publish ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Delegate') ?></th>
                    <td><?= $role->perm_delegate ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Sync') ?></th>
                    <td><?= $role->perm_sync ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Admin') ?></th>
                    <td><?= $role->perm_admin ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Audit') ?></th>
                    <td><?= $role->perm_audit ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Full') ?></th>
                    <td><?= $role->perm_full ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Auth') ?></th>
                    <td><?= $role->perm_auth ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Site Admin') ?></th>
                    <td><?= $role->perm_site_admin ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Regexp Access') ?></th>
                    <td><?= $role->perm_regexp_access ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Tagger') ?></th>
                    <td><?= $role->perm_tagger ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Template') ?></th>
                    <td><?= $role->perm_template ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Sharing Group') ?></th>
                    <td><?= $role->perm_sharing_group ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Tag Editor') ?></th>
                    <td><?= $role->perm_tag_editor ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Sighting') ?></th>
                    <td><?= $role->perm_sighting ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Object Template') ?></th>
                    <td><?= $role->perm_object_template ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Default Role') ?></th>
                    <td><?= $role->default_role ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Restricted To Site Admin') ?></th>
                    <td><?= $role->restricted_to_site_admin ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Publish Zmq') ?></th>
                    <td><?= $role->perm_publish_zmq ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Publish Kafka') ?></th>
                    <td><?= $role->perm_publish_kafka ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Decaying') ?></th>
                    <td><?= $role->perm_decaying ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Enforce Rate Limit') ?></th>
                    <td><?= $role->enforce_rate_limit ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Galaxy Editor') ?></th>
                    <td><?= $role->perm_galaxy_editor ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Perm Warninglist') ?></th>
                    <td><?= $role->perm_warninglist ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($role->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Organisation Id') ?></th>
                            <th><?= __('Server Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Autoalert') ?></th>
                            <th><?= __('Authkey') ?></th>
                            <th><?= __('Invited By') ?></th>
                            <th><?= __('Gpgkey') ?></th>
                            <th><?= __('Certif Public') ?></th>
                            <th><?= __('Nids Sid') ?></th>
                            <th><?= __('Termsaccepted') ?></th>
                            <th><?= __('Newsread') ?></th>
                            <th><?= __('Role Id') ?></th>
                            <th><?= __('Change Pw') ?></th>
                            <th><?= __('Contactalert') ?></th>
                            <th><?= __('Disabled') ?></th>
                            <th><?= __('Expiration') ?></th>
                            <th><?= __('Current Login') ?></th>
                            <th><?= __('Last Login') ?></th>
                            <th><?= __('Force Logout') ?></th>
                            <th><?= __('Date Created') ?></th>
                            <th><?= __('Date Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($role->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->organisation_id) ?></td>
                            <td><?= h($users->server_id) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->autoalert) ?></td>
                            <td><?= h($users->authkey) ?></td>
                            <td><?= h($users->invited_by) ?></td>
                            <td><?= h($users->gpgkey) ?></td>
                            <td><?= h($users->certif_public) ?></td>
                            <td><?= h($users->nids_sid) ?></td>
                            <td><?= h($users->termsaccepted) ?></td>
                            <td><?= h($users->newsread) ?></td>
                            <td><?= h($users->role_id) ?></td>
                            <td><?= h($users->change_pw) ?></td>
                            <td><?= h($users->contactalert) ?></td>
                            <td><?= h($users->disabled) ?></td>
                            <td><?= h($users->expiration) ?></td>
                            <td><?= h($users->current_login) ?></td>
                            <td><?= h($users->last_login) ?></td>
                            <td><?= h($users->force_logout) ?></td>
                            <td><?= h($users->date_created) ?></td>
                            <td><?= h($users->date_modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
