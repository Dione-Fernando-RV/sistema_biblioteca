<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TipoCurso Model
 *
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 *
 * @method \App\Model\Entity\TipoCurso newEmptyEntity()
 * @method \App\Model\Entity\TipoCurso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TipoCurso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoCurso get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoCurso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TipoCurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCurso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoCurso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoCurso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoCurso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoCurso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoCurso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TipoCurso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TipoCursoTable extends Table
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

        $this->setTable('tipo_curso');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->belongsTo('Situacoes', [
            'foreignKey' => 'situacao_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

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
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }
}
