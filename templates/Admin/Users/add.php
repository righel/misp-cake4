<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $organisations
 * @var \Cake\Collection\CollectionInterface|string[] $servers
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
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
