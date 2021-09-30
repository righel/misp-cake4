<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting[]|\Cake\Collection\CollectionInterface $userSettings
 */
?>
<div class="userSettings index content">
    <?= $this->Html->link(__('New User Setting'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Settings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('setting') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('timestamp') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userSettings as $userSetting): ?>
                <tr>
                    <td><?= $this->Number->format($userSetting->id) ?></td>
                    <td><?= h($userSetting->setting) ?></td>
                    <td><?= $userSetting->has('user') ? $this->Html->link($userSetting->user->id, ['controller' => 'Users', 'action' => 'view', $userSetting->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userSetting->timestamp) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userSetting->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSetting->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSetting->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
