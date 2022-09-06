<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Http\Session;

/**
 * Alunos Model
 *
 * @property \App\Model\Table\EscolaridadesTable&\Cake\ORM\Association\BelongsTo $Escolaridades
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsToMany $Cursos
 *
 * @method \App\Model\Entity\Aluno newEmptyEntity()
 * @method \App\Model\Entity\Aluno newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aluno findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Aluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlunosTable extends Table
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

        $this->setTable('alunos');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Escolaridades', [
            'foreignKey' => 'escolaridade_id',
        ]);
        $this->belongsTo('Situacoes', [
            'foreignKey' => 'situacao_id',
        ]);
        $this->belongsToMany('Cursos', [
            'foreignKey' => 'aluno_id',
            'targetForeignKey' => 'curso_id',
            'joinTable' => 'cursos_alunos',
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
            ->allowEmptyString('data_nascimento');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 250)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 250)
            ->allowEmptyString('telefone');

        $validator
            ->integer('cep')
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
            ->scalar('bairro')
            ->maxLength('bairro', 250)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('rua')
            ->maxLength('rua', 250)
            ->allowEmptyString('rua');

        $validator
            ->integer('numero')
            ->allowEmptyString('numero');

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

    /*
    public function beforeSave(Event $event,$entity)
    {       

        if (!empty($entity)) {
                  // $id = (new Session())->read('Auth.User.id');
                  
            if (!empty($entity->data_nascimento)) {
               
                if (!is_object($entity->data_nascimento)) {
                    $entity->data_nascimento = implode('-', array_reverse(explode('/', $entity->data_nascimento)));
                }
            }
        }

        return true;
    }
    */
}
