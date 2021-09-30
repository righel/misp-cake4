<?php

declare(strict_types=1);

use Cake\Utility\Hash;

$roles = Hash::extract($row->toArray(), $field['data_path']);
if (!empty($roles)) {
    if (!isset($roles[0])) {
        $roles = array($roles);
    }
    $count = count($roles);
    $i = 0;
    foreach ($roles as $role) {
        $i++;
        echo sprintf(
            '<a href="%s/roles/view/%s">%s</a>',
            $baseurl,
            h($role['id']),
            h($role['name'])
        );
        if ($i < $count) {
            echo '<br />';
        }
    }
}
