<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSetting $userSetting
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSetting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSetting->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Settings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSettings form content">
            <?= $this->Form->create($userSetting) ?>
            <fieldset>
                <legend><?= __('Edit User Setting') ?></legend>
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
