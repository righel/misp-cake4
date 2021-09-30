<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="logs form content">
            <?= $this->Form->create($log) ?>
            <fieldset>
                <legend><?= __('Add Log') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('model');
                    echo $this->Form->control('model_id');
                    echo $this->Form->control('action');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('change');
                    echo $this->Form->control('email');
                    echo $this->Form->control('org');
                    echo $this->Form->control('description');
                    echo $this->Form->control('ip');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
