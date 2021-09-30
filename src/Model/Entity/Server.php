<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Server Entity
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $authkey
 * @property int $organisation_id
 * @property bool $push
 * @property bool $pull
 * @property bool $push_sightings
 * @property bool $push_galaxy_clusters
 * @property bool $pull_galaxy_clusters
 * @property int|null $lastpulledid
 * @property int|null $lastpushedid
 * @property string|null $organization
 * @property int $remote_organisation_id
 * @property bool $publish_without_email
 * @property bool $unpublish_event
 * @property bool $self_signed
 * @property string $pull_rules
 * @property string $push_rules
 * @property string|null $cert_file
 * @property string|null $client_cert_file
 * @property bool $internal
 * @property bool $skip_proxy
 * @property bool $caching_enabled
 * @property int $priority
 *
 * @property \App\Model\Entity\Org $org
 * @property \App\Model\Entity\RemoteOrg $remote_org
 * @property \App\Model\Entity\User[] $users
 */
class Server extends Entity
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
        'url' => true,
        'authkey' => true,
        'organisation_id' => true,
        'push' => true,
        'pull' => true,
        'push_sightings' => true,
        'push_galaxy_clusters' => true,
        'pull_galaxy_clusters' => true,
        'lastpulledid' => true,
        'lastpushedid' => true,
        'organization' => true,
        'remote_organisation_id' => true,
        'publish_without_email' => true,
        'unpublish_event' => true,
        'self_signed' => true,
        'pull_rules' => true,
        'push_rules' => true,
        'cert_file' => true,
        'client_cert_file' => true,
        'internal' => true,
        'skip_proxy' => true,
        'caching_enabled' => true,
        'priority' => true,
        'org' => true,
        'remote_org' => true,
        'users' => true,
    ];
}
