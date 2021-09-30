<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id') ?></th>
                    <th><?= $this->Paginator->sort('server_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('autoalert') ?></th>
                    <th><?= $this->Paginator->sort('authkey') ?></th>
                    <th><?= $this->Paginator->sort('invited_by') ?></th>
                    <th><?= $this->Paginator->sort('nids_sid') ?></th>
                    <th><?= $this->Paginator->sort('termsaccepted') ?></th>
                    <th><?= $this->Paginator->sort('newsread') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('change_pw') ?></th>
                    <th><?= $this->Paginator->sort('contactalert') ?></th>
                    <th><?= $this->Paginator->sort('disabled') ?></th>
                    <th><?= $this->Paginator->sort('expiration') ?></th>
                    <th><?= $this->Paginator->sort('current_login') ?></th>
                    <th><?= $this->Paginator->sort('last_login') ?></th>
                    <th><?= $this->Paginator->sort('force_logout') ?></th>
                    <th><?= $this->Paginator->sort('date_created') ?></th>
                    <th><?= $this->Paginator->sort('date_modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->password) ?></td>
                    <td><?= $this->Number->format($user->organisation_id) ?></td>
                    <td><?= $user->has('server') ? $this->Html->link($user->server->name, ['controller' => 'Servers', 'action' => 'view', $user->server->id]) : '' ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->autoalert) ?></td>
                    <td><?= h($user->authkey) ?></td>
                    <td><?= $this->Number->format($user->invited_by) ?></td>
                    <td><?= $this->Number->format($user->nids_sid) ?></td>
                    <td><?= h($user->termsaccepted) ?></td>
                    <td><?= $this->Number->format($user->newsread) ?></td>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td><?= $this->Number->format($user->change_pw) ?></td>
                    <td><?= h($user->contactalert) ?></td>
                    <td><?= h($user->disabled) ?></td>
                    <td><?= h($user->expiration) ?></td>
                    <td><?= $this->Number->format($user->current_login) ?></td>
                    <td><?= $this->Number->format($user->last_login) ?></td>
                    <td><?= h($user->force_logout) ?></td>
                    <td><?= $this->Number->format($user->date_created) ?></td>
                    <td><?= $this->Number->format($user->date_modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
