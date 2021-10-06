<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'MISP';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?php
    if (empty($darkMode)) {
        echo $this->Html->css('bootstrap.min.css');
    } else {
        echo $this->Html->css('darkly-bootstrap.min.css');
    }
    ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->css('fontawesome.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('misp.js') ?>
    <?= $this->Html->script('utils.js') ?>
    <?= $this->Html->script('bootstrap-helper.js') ?>
    <?= $this->Html->script('api-helper.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body data-controller="<?= h($this->request->getAttribute('controller')) ?>" data-action="<?= h($this->request->getAttribute('action')) ?>">
    <header>
        <?= $this->element('global_menu') ?>
    </header>
    <div class="row">
        <div id="popover_form" class="ajax_popover_form"></div>
        <div id="popover_form_large" class="ajax_popover_form ajax_popover_form_large"></div>
        <div id="popover_form_x_large" class="ajax_popover_form ajax_popover_form_x_large"></div>
        <div id="popover_matrix" class="ajax_popover_form ajax_popover_matrix"></div>
        <div id="popover_box" class="popover_box"></div>
        <div id="screenshot_box" class="screenshot_box"></div>
        <div id="confirmation_box" class="confirmation_box"></div>
        <div id="gray_out" class="gray_out"></div>
        <?php
        if (!$this->request->is('ajax')) {
            echo $this->element('genericElements/SideMenu/side_menu', $menuData);
        }
        ?>
        <div id="main" role="main" class="col pt-3 px-4">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <div id="mainModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"></div>
    <div id="mainToastContainer" style="position: absolute; top: 15px; right: 15px; z-index: 1080"></div>
    <div id="mainModalContainer"></div>
</body>
<script>
    const darkMode = (<?= empty($darkMode) ? 'false' : 'true' ?>);
    var baseurl = '<?php echo $baseurl; ?>';
</script>

</html>