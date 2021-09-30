<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organisation Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property string|null $description
 * @property string|null $type
 * @property string|null $nationality
 * @property string|null $sector
 * @property int $created_by
 * @property string|null $uuid
 * @property string|null $contacts
 * @property bool $local
 * @property string|null $restricted_to_domain
 * @property string|null $landingpage
 */
class Organisation extends Entity
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
        'date_created' => true,
        'date_modified' => true,
        'description' => true,
        'type' => true,
        'nationality' => true,
        'sector' => true,
        'created_by' => true,
        'uuid' => true,
        'contacts' => true,
        'local' => true,
        'restricted_to_domain' => true,
        'landingpage' => true,
    ];
}
