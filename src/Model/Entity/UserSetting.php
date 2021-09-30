<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSetting Entity
 *
 * @property int $id
 * @property string $setting
 * @property string $value
 * @property int $user_id
 * @property int $timestamp
 *
 * @property \App\Model\Entity\User $user
 */
class UserSetting extends Entity
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
        'setting' => true,
        'value' => true,
        'user_id' => true,
        'timestamp' => true,
        'user' => true,
    ];
}
