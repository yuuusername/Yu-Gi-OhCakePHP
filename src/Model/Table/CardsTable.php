<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cards Model
 *
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 * @property \App\Model\Table\RacesTable&\Cake\ORM\Association\BelongsTo $Races
 * @property \App\Model\Table\AttributesTable&\Cake\ORM\Association\BelongsTo $Attributes
 *
 * @method \App\Model\Entity\Card newEmptyEntity()
 * @method \App\Model\Entity\Card newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Card[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Card get($primaryKey, $options = [])
 * @method \App\Model\Entity\Card findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Card patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Card[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Card|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Card saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CardsTable extends Table
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

        $this->setTable('cards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
        ]);
        $this->belongsTo('Races', [
            'foreignKey' => 'race_id',
        ]);
        $this->belongsTo('Attributes', [
            'foreignKey' => 'attribute_id',
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
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('type_id')
            ->notEmptyString('type_id');

        $validator
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        $validator
            ->integer('race_id')
            ->notEmptyString('race_id');

        $validator
            ->integer('attribute_id')
            ->notEmptyString('attribute_id');

        $validator
            ->integer('atk')
            ->requirePresence('atk', 'create')
            ->notEmptyString('atk');

        $validator
            ->integer('def')
            ->requirePresence('def', 'create')
            ->notEmptyString('def');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('type_id', 'Types'), ['errorField' => 'type_id']);
        $rules->add($rules->existsIn('race_id', 'Races'), ['errorField' => 'race_id']);
        $rules->add($rules->existsIn('attribute_id', 'Attributes'), ['errorField' => 'attribute_id']);

        return $rules;
    }
}
