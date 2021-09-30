<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="roles index content">
    <?= $this->Html->link(__('New Role'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Roles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('perm_add') ?></th>
                    <th><?= $this->Paginator->sort('perm_modify') ?></th>
                    <th><?= $this->Paginator->sort('perm_modify_org') ?></th>
                    <th><?= $this->Paginator->sort('perm_publish') ?></th>
                    <th><?= $this->Paginator->sort('perm_delegate') ?></th>
                    <th><?= $this->Paginator->sort('perm_sync') ?></th>
                    <th><?= $this->Paginator->sort('perm_admin') ?></th>
                    <th><?= $this->Paginator->sort('perm_audit') ?></th>
                    <th><?= $this->Paginator->sort('perm_full') ?></th>
                    <th><?= $this->Paginator->sort('perm_auth') ?></th>
                    <th><?= $this->Paginator->sort('perm_site_admin') ?></th>
                    <th><?= $this->Paginator->sort('perm_regexp_access') ?></th>
                    <th><?= $this->Paginator->sort('perm_tagger') ?></th>
                    <th><?= $this->Paginator->sort('perm_template') ?></th>
                    <th><?= $this->Paginator->sort('perm_sharing_group') ?></th>
                    <th><?= $this->Paginator->sort('perm_tag_editor') ?></th>
                    <th><?= $this->Paginator->sort('perm_sighting') ?></th>
                    <th><?= $this->Paginator->sort('perm_object_template') ?></th>
                    <th><?= $this->Paginator->sort('default_role') ?></th>
                    <th><?= $this->Paginator->sort('memory_limit') ?></th>
                    <th><?= $this->Paginator->sort('max_execution_time') ?></th>
                    <th><?= $this->Paginator->sort('restricted_to_site_admin') ?></th>
                    <th><?= $this->Paginator->sort('perm_publish_zmq') ?></th>
                    <th><?= $this->Paginator->sort('perm_publish_kafka') ?></th>
                    <th><?= $this->Paginator->sort('perm_decaying') ?></th>
                    <th><?= $this->Paginator->sort('enforce_rate_limit') ?></th>
                    <th><?= $this->Paginator->sort('rate_limit_count') ?></th>
                    <th><?= $this->Paginator->sort('perm_galaxy_editor') ?></th>
                    <th><?= $this->Paginator->sort('perm_warninglist') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td><?= h($role->created) ?></td>
                    <td><?= h($role->modified) ?></td>
                    <td><?= h($role->perm_add) ?></td>
                    <td><?= h($role->perm_modify) ?></td>
                    <td><?= h($role->perm_modify_org) ?></td>
                    <td><?= h($role->perm_publish) ?></td>
                    <td><?= h($role->perm_delegate) ?></td>
                    <td><?= h($role->perm_sync) ?></td>
                    <td><?= h($role->perm_admin) ?></td>
                    <td><?= h($role->perm_audit) ?></td>
                    <td><?= h($role->perm_full) ?></td>
                    <td><?= h($role->perm_auth) ?></td>
                    <td><?= h($role->perm_site_admin) ?></td>
                    <td><?= h($role->perm_regexp_access) ?></td>
                    <td><?= h($role->perm_tagger) ?></td>
                    <td><?= h($role->perm_template) ?></td>
                    <td><?= h($role->perm_sharing_group) ?></td>
                    <td><?= h($role->perm_tag_editor) ?></td>
                    <td><?= h($role->perm_sighting) ?></td>
                    <td><?= h($role->perm_object_template) ?></td>
                    <td><?= h($role->default_role) ?></td>
                    <td><?= h($role->memory_limit) ?></td>
                    <td><?= h($role->max_execution_time) ?></td>
                    <td><?= h($role->restricted_to_site_admin) ?></td>
                    <td><?= h($role->perm_publish_zmq) ?></td>
                    <td><?= h($role->perm_publish_kafka) ?></td>
                    <td><?= h($role->perm_decaying) ?></td>
                    <td><?= h($role->enforce_rate_limit) ?></td>
                    <td><?= $this->Number->format($role->rate_limit_count) ?></td>
                    <td><?= h($role->perm_galaxy_editor) ?></td>
                    <td><?= h($role->perm_warninglist) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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
