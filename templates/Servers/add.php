<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Server $server
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Servers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servers form content">
            <?= $this->Form->create($server) ?>
            <fieldset>
                <legend><?= __('Add Server') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('url');
                    echo $this->Form->control('authkey');
                    echo $this->Form->control('organisation_id');
                    echo $this->Form->control('push');
                    echo $this->Form->control('pull');
                    echo $this->Form->control('push_sightings');
                    echo $this->Form->control('push_galaxy_clusters');
                    echo $this->Form->control('pull_galaxy_clusters');
                    echo $this->Form->control('lastpulledid');
                    echo $this->Form->control('lastpushedid');
                    echo $this->Form->control('organization');
                    echo $this->Form->control('remote_organisation_id');
                    echo $this->Form->control('publish_without_email');
                    echo $this->Form->control('unpublish_event');
                    echo $this->Form->control('self_signed');
                    echo $this->Form->control('pull_rules');
                    echo $this->Form->control('push_rules');
                    echo $this->Form->control('cert_file');
                    echo $this->Form->control('client_cert_file');
                    echo $this->Form->control('internal');
                    echo $this->Form->control('skip_proxy');
                    echo $this->Form->control('caching_enabled');
                    echo $this->Form->control('priority');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
