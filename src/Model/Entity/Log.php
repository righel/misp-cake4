<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $id
 * @property string|null $title
 * @property \Cake\I18n\FrozenTime $created
 * @property int $model_id
 * @property string $action
 * @property int $user_id
 * @property string|null $change
 * @property string $email
 * @property string $org
 * @property string|null $description
 * @property string $ip
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\User $user
 */
class Log extends Entity
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
        'title' => true,
        'created' => true,
        'model' => true,
        'model_id' => true,
        'action' => true,
        'user_id' => true,
        'change' => true,
        'email' => true,
        'org' => true,
        'description' => true,
        'ip' => true,
        'user' => true,
    ];
}
