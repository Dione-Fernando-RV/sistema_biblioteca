<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursoDisciplinasInstrutores Model
 *
 * @property \App\Model\Table\CursoDisciplinasTable&\Cake\ORM\Association\BelongsTo $CursoDisciplinas
 * @property \App\Model\Table\InstrutoresTable&\Cake\ORM\Association\BelongsTo $Instrutores
 * @property \App\Model\Table\CursosTurmasTable&\Cake\ORM\Association\BelongsTo $CursosTurmas
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 *
 * @method \App\Model\Entity\CursoDisciplinasInstrutore newEmptyEntity()
 * @method \App\Model\Entity\CursoDisciplinasInstrutore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursoDisciplinasInstrutoresTable extends Table
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

        $this->setTable('curso_disciplinas_instrutores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CursoDisciplinas', [
            'foreignKey' => 'curso_disciplina_id',
        ]);
        $this->belongsTo('Instrutores', [
            'foreignKey' => 'instrutores_id',
        ]);
        $this->belongsTo('CursosTurmas', [
            'foreignKey' => 'curso_turma_id',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'cadastrado_por',
        ]);
        $this->belongsTo('UsuariosEdit', [
            'className' => 'Usuarios',
            'foreignKey' => 'modeificado_por',
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
        $rules->add($rules->existsIn(['curso_disciplina_id'], 'CursoDisciplinas'), ['errorField' => 'curso_disciplina_id']);
        $rules->add($rules->existsIn(['instrutores_id'], 'Instrutores'), ['errorField' => 'instrutores_id']);
        $rules->add($rules->existsIn(['curso_turma_id'], 'CursosTurmas'), ['errorField' => 'curso_turma_id']);
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }
}
