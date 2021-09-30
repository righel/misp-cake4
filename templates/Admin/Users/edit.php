<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $organisations
 * @var string[]|\Cake\Collection\CollectionInterface $servers
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('password');
                    echo $this->Form->control('organisation_id');
                    echo $this->Form->control('server_id', ['options' => $servers]);
                    echo $this->Form->control('email');
                    echo $this->Form->control('autoalert');
                    echo $this->Form->control('authkey');
                    echo $this->Form->control('invited_by');
                    echo $this->Form->control('gpgkey');
                    echo $this->Form->control('certif_public');
                    echo $this->Form->control('nids_sid');
                    echo $this->Form->control('termsaccepted');
                    echo $this->Form->control('newsread');
                    echo $this->Form->control('role_id', ['options' => $roles]);
                    echo $this->Form->control('change_pw');
                    echo $this->Form->control('contactalert');
                    echo $this->Form->control('disabled');
                    echo $this->Form->control('expiration', ['empty' => true]);
                    echo $this->Form->control('current_login');
                    echo $this->Form->control('last_login');
                    echo $this->Form->control('force_logout');
                    echo $this->Form->control('date_created');
                    echo $this->Form->control('date_modified');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
