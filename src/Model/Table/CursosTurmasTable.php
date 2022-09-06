<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursosTurmas Model
 *
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 *
 * @method \App\Model\Entity\CursosTurma newEmptyEntity()
 * @method \App\Model\Entity\CursosTurma newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CursosTurma[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursosTurma get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursosTurma findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CursosTurma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursosTurma[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursosTurma|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosTurma saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosTurma[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosTurma[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosTurma[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosTurma[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursosTurmasTable extends Table
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

        $this->setTable('cursos_turmas');
        $this->setDisplayField('turma');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id',
        ]);
        $this->hasMany('AgendaCursos', [
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
            ->scalar('turma')
            ->maxLength('turma', 255)
            ->allowEmptyString('turma');

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
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'), ['errorField' => 'curso_id']);

        return $rules;
    }

    public function getTurmasCursos()
    {
        $cursosTurma = $this;
        $query = $cursosTurma->find('list', [
            'keyField' => 'id',
            'valueField' => function ($cursosTurma) {
                return $cursosTurma->turma . ' - ' . $cursosTurma->curso->nome;
            }
        ])->contain(['Cursos'])
            ->distinct('CursosTurmas.id')
            ->where(['CursosTurmas.situacao_id' => 1]);

        return $query;
    }
}   
