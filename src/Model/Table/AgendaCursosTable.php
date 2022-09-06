<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\I18n\Date;
use Cake\ORM\TableRegistry;



/**
 * AgendaCursos Model
 *
 * @property \App\Model\Table\CursosTurmasTable&\Cake\ORM\Association\BelongsTo $CursosTurmas
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 *
 * @method \App\Model\Entity\AgendaCurso newEmptyEntity()
 * @method \App\Model\Entity\AgendaCurso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AgendaCurso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AgendaCurso get($primaryKey, $options = [])
 * @method \App\Model\Entity\AgendaCurso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AgendaCurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AgendaCurso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AgendaCurso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgendaCurso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AgendaCurso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AgendaCurso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AgendaCurso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AgendaCurso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgendaCursosTable extends Table
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

        $this->setTable('agenda_cursos');
        $this->setDisplayField('turma_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CursosTurmas', [
            'foreignKey' => 'turma_id',
        ]);
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
            //->date('data_inicio')
            ->allowEmptyDate('data_inicio');

        $validator
            // ->date('data_fim')
            ->allowEmptyDate('data_fim');

        $validator
            //  ->integer('carga_horaria')
            ->allowEmptyString('carga_horaria');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 255)
            ->allowEmptyString('estado');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 255)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('local')
            ->maxLength('local', 255)
            ->allowEmptyString('local');

        $validator
            ->integer('tipo')
            ->allowEmptyString('tipo');

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
        $rules->add($rules->existsIn(['turma_id'], 'CursosTurmas'), ['errorField' => 'turma_id']);
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }

    public function getMatricula()
    {
        $agendaCursos = $this;
        $query = $agendaCursos->find('list', [
            'keyField' => 'id',
            'valueField' => function ($agendaCursos) {
                return $agendaCursos->cursos_turma->turma . ' - ' . $agendaCursos->cursos_turma->curso->nome;
            }
        ])->contain(['CursosTurmas' => ['Cursos']  ])
            ->distinct('CursosTurmas.id')
            ->where(['CursosTurmas.situacao_id' => 1]);

        return $query;
    }

}
