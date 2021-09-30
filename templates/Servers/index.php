<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server[]|\Cake\Collection\CollectionInterface $servers
 */
?>
<div class="servers index content">
    <?= $this->Html->link(__('New Server'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Servers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th><?= $this->Paginator->sort('authkey') ?></th>
                    <th><?= $this->Paginator->sort('organisation_id') ?></th>
                    <th><?= $this->Paginator->sort('push') ?></th>
                    <th><?= $this->Paginator->sort('pull') ?></th>
                    <th><?= $this->Paginator->sort('push_sightings') ?></th>
                    <th><?= $this->Paginator->sort('push_galaxy_clusters') ?></th>
                    <th><?= $this->Paginator->sort('pull_galaxy_clusters') ?></th>
                    <th><?= $this->Paginator->sort('lastpulledid') ?></th>
                    <th><?= $this->Paginator->sort('lastpushedid') ?></th>
                    <th><?= $this->Paginator->sort('organization') ?></th>
                    <th><?= $this->Paginator->sort('remote_organisation_id') ?></th>
                    <th><?= $this->Paginator->sort('publish_without_email') ?></th>
                    <th><?= $this->Paginator->sort('unpublish_event') ?></th>
                    <th><?= $this->Paginator->sort('self_signed') ?></th>
                    <th><?= $this->Paginator->sort('cert_file') ?></th>
                    <th><?= $this->Paginator->sort('client_cert_file') ?></th>
                    <th><?= $this->Paginator->sort('internal') ?></th>
                    <th><?= $this->Paginator->sort('skip_proxy') ?></th>
                    <th><?= $this->Paginator->sort('caching_enabled') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($servers as $server): ?>
                <tr>
                    <td><?= $this->Number->format($server->id) ?></td>
                    <td><?= h($server->name) ?></td>
                    <td><?= h($server->url) ?></td>
                    <td><?= h($server->authkey) ?></td>
                    <td><?= $this->Number->format($server->organisation_id) ?></td>
                    <td><?= h($server->push) ?></td>
                    <td><?= h($server->pull) ?></td>
                    <td><?= h($server->push_sightings) ?></td>
                    <td><?= h($server->push_galaxy_clusters) ?></td>
                    <td><?= h($server->pull_galaxy_clusters) ?></td>
                    <td><?= $this->Number->format($server->lastpulledid) ?></td>
                    <td><?= $this->Number->format($server->lastpushedid) ?></td>
                    <td><?= h($server->organization) ?></td>
                    <td><?= $this->Number->format($server->remote_organisation_id) ?></td>
                    <td><?= h($server->publish_without_email) ?></td>
                    <td><?= h($server->unpublish_event) ?></td>
                    <td><?= h($server->self_signed) ?></td>
                    <td><?= h($server->cert_file) ?></td>
                    <td><?= h($server->client_cert_file) ?></td>
                    <td><?= h($server->internal) ?></td>
                    <td><?= h($server->skip_proxy) ?></td>
                    <td><?= h($server->caching_enabled) ?></td>
                    <td><?= $this->Number->format($server->priority) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $server->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $server->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id)]) ?>
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
