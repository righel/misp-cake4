<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property bool|null $perm_add
 * @property bool|null $perm_modify
 * @property bool|null $perm_modify_org
 * @property bool|null $perm_publish
 * @property bool $perm_delegate
 * @property bool|null $perm_sync
 * @property bool|null $perm_admin
 * @property bool|null $perm_audit
 * @property bool|null $perm_full
 * @property bool $perm_auth
 * @property bool $perm_site_admin
 * @property bool $perm_regexp_access
 * @property bool $perm_tagger
 * @property bool $perm_template
 * @property bool $perm_sharing_group
 * @property bool $perm_tag_editor
 * @property bool $perm_sighting
 * @property bool $perm_object_template
 * @property bool $default_role
 * @property string|null $memory_limit
 * @property string|null $max_execution_time
 * @property bool $restricted_to_site_admin
 * @property bool $perm_publish_zmq
 * @property bool $perm_publish_kafka
 * @property bool $perm_decaying
 * @property bool $enforce_rate_limit
 * @property int $rate_limit_count
 * @property bool $perm_galaxy_editor
 * @property bool $perm_warninglist
 *
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'created' => true,
        'modified' => true,
        'perm_add' => true,
        'perm_modify' => true,
        'perm_modify_org' => true,
        'perm_publish' => true,
        'perm_delegate' => true,
        'perm_sync' => true,
        'perm_admin' => true,
        'perm_audit' => true,
        'perm_full' => true,
        'perm_auth' => true,
        'perm_site_admin' => true,
        'perm_regexp_access' => true,
        'perm_tagger' => true,
        'perm_template' => true,
        'perm_sharing_group' => true,
        'perm_tag_editor' => true,
        'perm_sighting' => true,
        'perm_object_template' => true,
        'default_role' => true,
        'memory_limit' => true,
        'max_execution_time' => true,
        'restricted_to_site_admin' => true,
        'perm_publish_zmq' => true,
        'perm_publish_kafka' => true,
        'perm_decaying' => true,
        'enforce_rate_limit' => true,
        'rate_limit_count' => true,
        'perm_galaxy_editor' => true,
        'perm_warninglist' => true,
        'users' => true,
    ];
}
