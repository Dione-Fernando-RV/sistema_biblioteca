<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursoDisciplinas Model
 *
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsTo $Cursos
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 * @property \App\Model\Table\InstrutoresTable&\Cake\ORM\Association\BelongsToMany $Instrutores
 *
 * @method \App\Model\Entity\CursoDisciplina newEmptyEntity()
 * @method \App\Model\Entity\CursoDisciplina newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplina[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplina get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursoDisciplina findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CursoDisciplina patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplina[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursoDisciplina|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoDisciplina saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursoDisciplina[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplina[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplina[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursoDisciplina[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursoDisciplinasTable extends Table
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

        $this->setTable('curso_disciplinas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id',
        ]);
        $this->belongsTo('Situacoes', [
            'foreignKey' => 'situacao_id',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'cadastrado_por',
        ]);
        $this->belongsTo('UsuariosEdit', [
            'className' => 'Usuarios',
            'foreignKey' => 'modeificado_por',
        ]);
        $this->belongsToMany('Instrutores', [
            'foreignKey' => 'curso_disciplina_id',
            'targetForeignKey' => 'instrutores_id',
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
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->integer('cadastrado_por')
            ->allowEmptyString('cadastrado_por');

        $validator
            ->dateTime('create')
            ->allowEmptyDateTime('create');

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
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'), ['errorField' => 'curso_id']);
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }
}
