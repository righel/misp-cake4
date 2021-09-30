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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organisation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organisation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Organisations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="organisations form content">
            <?= $this->Form->create($organisation) ?>
            <fieldset>
                <legend><?= __('Edit Organisation') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('date_modified');
                    echo $this->Form->control('description');
                    echo $this->Form->control('type');
                    echo $this->Form->control('nationality');
                    echo $this->Form->control('sector');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('uuid');
                    echo $this->Form->control('contacts');
                    echo $this->Form->control('local');
                    echo $this->Form->control('restricted_to_domain');
                    echo $this->Form->control('landingpage');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
