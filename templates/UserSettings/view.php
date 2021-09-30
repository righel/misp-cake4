<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting $userSetting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Setting'), ['action' => 'edit', $userSetting->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Setting'), ['action' => 'delete', $userSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSetting->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Setting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSettings view content">
            <h3><?= h($userSetting->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Setting') ?></th>
                    <td><?= h($userSetting->setting) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userSetting->has('user') ? $this->Html->link($userSetting->user->id, ['controller' => 'Users', 'action' => 'view', $userSetting->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userSetting->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Timestamp') ?></th>
                    <td><?= $this->Number->format($userSetting->timestamp) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Value') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($userSetting->value)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
