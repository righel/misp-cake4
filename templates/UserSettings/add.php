<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting $userSetting
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSettings form content">
            <?= $this->Form->create($userSetting) ?>
            <fieldset>
                <legend><?= __('Add User Setting') ?></legend>
                <?php
                    echo $this->Form->control('setting');
                    echo $this->Form->control('value');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('timestamp');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
