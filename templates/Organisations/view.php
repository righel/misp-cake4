<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organisation $organisation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Organisation'), ['action' => 'edit', $organisation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Organisation'), ['action' => 'delete', $organisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Organisation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="organisations view content">
            <h3><?= h($organisation->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($organisation->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($organisation->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nationality') ?></th>
                    <td><?= h($organisation->nationality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sector') ?></th>
                    <td><?= h($organisation->sector) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uuid') ?></th>
                    <td><?= h($organisation->uuid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($organisation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($organisation->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Created') ?></th>
                    <td><?= h($organisation->date_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Modified') ?></th>
                    <td><?= h($organisation->date_modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Local') ?></th>
                    <td><?= $organisation->local ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($organisation->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Contacts') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($organisation->contacts)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Restricted To Domain') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($organisation->restricted_to_domain)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Landingpage') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($organisation->landingpage)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
