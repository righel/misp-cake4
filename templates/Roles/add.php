<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Roles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roles form content">
            <?= $this->Form->create($role) ?>
            <fieldset>
                <legend><?= __('Add Role') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('perm_add');
                    echo $this->Form->control('perm_modify');
                    echo $this->Form->control('perm_modify_org');
                    echo $this->Form->control('perm_publish');
                    echo $this->Form->control('perm_delegate');
                    echo $this->Form->control('perm_sync');
                    echo $this->Form->control('perm_admin');
                    echo $this->Form->control('perm_audit');
                    echo $this->Form->control('perm_full');
                    echo $this->Form->control('perm_auth');
                    echo $this->Form->control('perm_site_admin');
                    echo $this->Form->control('perm_regexp_access');
                    echo $this->Form->control('perm_tagger');
                    echo $this->Form->control('perm_template');
                    echo $this->Form->control('perm_sharing_group');
                    echo $this->Form->control('perm_tag_editor');
                    echo $this->Form->control('perm_sighting');
                    echo $this->Form->control('perm_object_template');
                    echo $this->Form->control('default_role');
                    echo $this->Form->control('memory_limit');
                    echo $this->Form->control('max_execution_time');
                    echo $this->Form->control('restricted_to_site_admin');
                    echo $this->Form->control('perm_publish_zmq');
                    echo $this->Form->control('perm_publish_kafka');
                    echo $this->Form->control('perm_decaying');
                    echo $this->Form->control('enforce_rate_limit');
                    echo $this->Form->control('rate_limit_count');
                    echo $this->Form->control('perm_galaxy_editor');
                    echo $this->Form->control('perm_warninglist');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
