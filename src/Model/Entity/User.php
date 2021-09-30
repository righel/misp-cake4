<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $password
 * @property int $organisation_id
 * @property int $server_id
 * @property string $email
 * @property bool $autoalert
 * @property string|null $authkey
 * @property int $invited_by
 * @property string|null $gpgkey
 * @property string|null $certif_public
 * @property int $nids_sid
 * @property bool $termsaccepted
 * @property int|null $newsread
 * @property int $role_id
 * @property int $change_pw
 * @property bool $contactalert
 * @property bool $disabled
 * @property \Cake\I18n\FrozenTime|null $expiration
 * @property int|null $current_login
 * @property int|null $last_login
 * @property bool $force_logout
 * @property int|null $date_created
 * @property int|null $date_modified
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Server $server
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
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
        'password' => true,
        'organisation_id' => true,
        'server_id' => true,
        'email' => true,
        'autoalert' => true,
        'authkey' => true,
        'invited_by' => true,
        'gpgkey' => true,
        'certif_public' => true,
        'nids_sid' => true,
        'termsaccepted' => true,
        'newsread' => true,
        'role_id' => true,
        'change_pw' => true,
        'contactalert' => true,
        'disabled' => true,
        'expiration' => true,
        'current_login' => true,
        'last_login' => true,
        'force_logout' => true,
        'date_created' => true,
        'date_modified' => true,
        'organisation' => true,
        'server' => true,
        'role' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
