<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @property \App\Model\Table\TipoCadastroTable&\Cake\ORM\Association\BelongsTo $TipoCadastro
 * @property \App\Model\Table\SituacoesTable&\Cake\ORM\Association\BelongsTo $Situacoes
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\HasMany $Usuarios
 *
 * @method \App\Model\Entity\Cliente newEmptyEntity()
 * @method \App\Model\Entity\Cliente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TipoCadastro', [
            'foreignKey' => 'tipo_cadastro_id',
        ]);
        $this->belongsTo('Situacoes', [
            'foreignKey' => 'situacao_id',
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'cliente_id',
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
            ->email('email')
            ->allowEmptyString('email');

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
            ->integer('cadastro_completo')
            ->allowEmptyString('cadastro_completo');

        $validator
            ->integer('cadastrado_por')
            ->allowEmptyString('cadastrado_por');

        $validator
            ->integer('modificado_por')
            ->allowEmptyString('modificado_por');

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
        $rules->add($rules->existsIn(['tipo_cadastro_id'], 'TipoCadastro'), ['errorField' => 'tipo_cadastro_id']);
        $rules->add($rules->existsIn(['situacao_id'], 'Situacoes'), ['errorField' => 'situacao_id']);

        return $rules;
    }
}
