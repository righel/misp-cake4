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
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('main.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <?= $this->element('global_menu') ?>
    </header>
    <main role="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1 d-none d-xl-block sidebar p-0">
                    <?= $this->element('genericElements/SideMenu/side_menu', $menuData) ?>
                </div>
                <div role="main" class="col-xl-11 col-lg-12 ml-sm-auto pt-3 px-4">
                    <div class="col-12 d-xl-none px-0"><?= $this->element('genericElements/SideMenu/side_menu', ['minimal' => 1]) ?></div>
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </main>
    <div id="mainModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true"></div>
    <div id="mainToastContainer" style="position: absolute; top: 15px; right: 15px; z-index: 1080"></div>
    <div id="mainModalContainer"></div>
</body>
<script>
    const darkMode = (<?= empty($darkMode) ? 'false' : 'true' ?>)
</script>

</html>