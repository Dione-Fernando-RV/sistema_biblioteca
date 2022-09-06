<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Instrutores Model
 *
 * @property \App\Model\Table\EscolaridadesTable&\Cake\ORM\Association\BelongsTo $Escolaridades
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 * @property \App\Model\Table\CursoDisciplinasTable&\Cake\ORM\Association\BelongsToMany $CursoDisciplinas
 *
 * @method \App\Model\Entity\Instrutore newEmptyEntity()
 * @method \App\Model\Entity\Instrutore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Instrutore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Instrutore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Instrutore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Instrutore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Instrutore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Instrutore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Instrutore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Instrutore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Instrutore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Instrutore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Instrutore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InstrutoresTable extends Table
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

        $this->setTable('instrutores');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Escolaridades', [
            'foreignKey' => 'escolaridade_id',
        ]);
        $this->belongsTo('Situacoes', [
            'foreignKey' => 'situacao_id',
        ]);
        $this->belongsToMany('CursoDisciplinas', [
            'foreignKey' => 'instrutores_id',
            'targetForeignKey' => 'curso_disciplina_id',
            'joinTable' => 'curso_disciplinas_instrutores',
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
            ->maxLength('nome', 250)
            ->allowEmptyString('nome');

        $validator
            ->date('data_nascimento')
            ->allowEmptyDate('data_nascimento');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 250)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 250)
            ->allowEmptyString('telefone');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 250)
            ->allowEmptyString('cep');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 250)
            ->allowEmptyString('estado');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 250)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('rua')
            ->maxLength('rua', 250)
            ->allowEmptyString('rua');

        $validator
            ->integer('numero')
            ->allowEmptyString('numero');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 250)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('formacao')
            ->maxLength('formacao', 255)
            ->allowEmptyString('formacao');

        $validator
            ->scalar('curriculo_lattes')
            ->allowEmptyString('curriculo_lattes');

        $validator
            ->integer('cadastrado_por')
            ->allowEmptyString('cadastrado_por');

        $validator
            ->integer('modeificado_por')
            ->allowEmptyString('modeificado_por');

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
        $rules->add($rules->existsIn(['escolaridade_id'], 'Escolaridades'), ['errorField' => 'escolaridade_id']);
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }
}
