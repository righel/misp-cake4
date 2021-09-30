<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Server'), ['action' => 'edit', $server->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Server'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Servers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Server'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servers view content">
            <h3><?= h($server->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($server->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= h($server->url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Authkey') ?></th>
                    <td><?= h($server->authkey) ?></td>
                </tr>
                <tr>
                    <th><?= __('Organization') ?></th>
                    <td><?= h($server->organization) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cert File') ?></th>
                    <td><?= h($server->cert_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client Cert File') ?></th>
                    <td><?= h($server->client_cert_file) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($server->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Organisation Id') ?></th>
                    <td><?= $this->Number->format($server->organisation_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastpulledid') ?></th>
                    <td><?= $this->Number->format($server->lastpulledid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastpushedid') ?></th>
                    <td><?= $this->Number->format($server->lastpushedid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Remote Organisation Id') ?></th>
                    <td><?= $this->Number->format($server->remote_organisation_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= $this->Number->format($server->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Push') ?></th>
                    <td><?= $server->push ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Pull') ?></th>
                    <td><?= $server->pull ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Push Sightings') ?></th>
                    <td><?= $server->push_sightings ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Push Galaxy Clusters') ?></th>
                    <td><?= $server->push_galaxy_clusters ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Pull Galaxy Clusters') ?></th>
                    <td><?= $server->pull_galaxy_clusters ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Publish Without Email') ?></th>
                    <td><?= $server->publish_without_email ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Unpublish Event') ?></th>
                    <td><?= $server->unpublish_event ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Self Signed') ?></th>
                    <td><?= $server->self_signed ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Internal') ?></th>
                    <td><?= $server->internal ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Skip Proxy') ?></th>
                    <td><?= $server->skip_proxy ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Caching Enabled') ?></th>
                    <td><?= $server->caching_enabled ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Pull Rules') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($server->pull_rules)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Push Rules') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($server->push_rules)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($server->users)) : ?>
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
                        <?php foreach ($server->users as $users) : ?>
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
