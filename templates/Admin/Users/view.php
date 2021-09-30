<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Server') ?></th>
                    <td><?= $user->has('server') ? $this->Html->link($user->server->name, ['controller' => 'Servers', 'action' => 'view', $user->server->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Authkey') ?></th>
                    <td><?= h($user->authkey) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Organisation Id') ?></th>
                    <td><?= $this->Number->format($user->organisation_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invited By') ?></th>
                    <td><?= $this->Number->format($user->invited_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nids Sid') ?></th>
                    <td><?= $this->Number->format($user->nids_sid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Newsread') ?></th>
                    <td><?= $this->Number->format($user->newsread) ?></td>
                </tr>
                <tr>
                    <th><?= __('Change Pw') ?></th>
                    <td><?= $this->Number->format($user->change_pw) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Login') ?></th>
                    <td><?= $this->Number->format($user->current_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= $this->Number->format($user->last_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= $this->Number->format($user->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Modified') ?></th>
                    <td><?= $this->Number->format($user->date_modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expiration') ?></th>
                    <td><?= h($user->expiration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Autoalert') ?></th>
                    <td><?= $user->autoalert ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Termsaccepted') ?></th>
                    <td><?= $user->termsaccepted ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Contactalert') ?></th>
                    <td><?= $user->contactalert ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Disabled') ?></th>
                    <td><?= $user->disabled ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Force Logout') ?></th>
                    <td><?= $user->force_logout ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Gpgkey') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->gpgkey)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Certif Public') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->certif_public)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
