<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Role newEmptyEntity()
 * @method \App\Model\Entity\Role newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Role[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Role get($primaryKey, $options = [])
 * @method \App\Model\Entity\Role findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Role patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Role[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Role|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Role saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RolesTable extends AppModel
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('roles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'role_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('perm_add')
            ->allowEmptyString('perm_add');

        $validator
            ->boolean('perm_modify')
            ->allowEmptyString('perm_modify');

        $validator
            ->boolean('perm_modify_org')
            ->allowEmptyString('perm_modify_org');

        $validator
            ->boolean('perm_publish')
            ->allowEmptyString('perm_publish');

        $validator
            ->boolean('perm_delegate')
            ->notEmptyString('perm_delegate');

        $validator
            ->boolean('perm_sync')
            ->allowEmptyString('perm_sync');

        $validator
            ->boolean('perm_admin')
            ->allowEmptyString('perm_admin');

        $validator
            ->boolean('perm_audit')
            ->allowEmptyString('perm_audit');

        $validator
            ->boolean('perm_full')
            ->allowEmptyString('perm_full');

        $validator
            ->boolean('perm_auth')
            ->notEmptyString('perm_auth');

        $validator
            ->boolean('perm_site_admin')
            ->notEmptyString('perm_site_admin');

        $validator
            ->boolean('perm_regexp_access')
            ->notEmptyString('perm_regexp_access');

        $validator
            ->boolean('perm_tagger')
            ->notEmptyString('perm_tagger');

        $validator
            ->boolean('perm_template')
            ->notEmptyString('perm_template');

        $validator
            ->boolean('perm_sharing_group')
            ->notEmptyString('perm_sharing_group');

        $validator
            ->boolean('perm_tag_editor')
            ->notEmptyString('perm_tag_editor');

        $validator
            ->boolean('perm_sighting')
            ->notEmptyString('perm_sighting');

        $validator
            ->boolean('perm_object_template')
            ->notEmptyString('perm_object_template');

        $validator
            ->boolean('default_role')
            ->notEmptyString('default_role');

        $validator
            ->scalar('memory_limit')
            ->maxLength('memory_limit', 255)
            ->allowEmptyString('memory_limit');

        $validator
            ->scalar('max_execution_time')
            ->maxLength('max_execution_time', 255)
            ->allowEmptyString('max_execution_time');

        $validator
            ->boolean('restricted_to_site_admin')
            ->notEmptyString('restricted_to_site_admin');

        $validator
            ->boolean('perm_publish_zmq')
            ->notEmptyString('perm_publish_zmq');

        $validator
            ->boolean('perm_publish_kafka')
            ->notEmptyString('perm_publish_kafka');

        $validator
            ->boolean('perm_decaying')
            ->notEmptyString('perm_decaying');

        $validator
            ->boolean('enforce_rate_limit')
            ->notEmptyString('enforce_rate_limit');

        $validator
            ->integer('rate_limit_count')
            ->notEmptyString('rate_limit_count');

        $validator
            ->boolean('perm_galaxy_editor')
            ->notEmptyString('perm_galaxy_editor');

        $validator
            ->boolean('perm_warninglist')
            ->notEmptyString('perm_warninglist');

        return $validator;
    }
}
