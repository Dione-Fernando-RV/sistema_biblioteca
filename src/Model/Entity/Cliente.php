<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenDate|null $data_nascimento
 * @property string|null $cpf
 * @property string|null $telefone
 * @property string|null $email
 * @property int|null $cep
 * @property string|null $estado
 * @property string|null $cidade
 * @property string|null $bairro
 * @property string|null $rua
 * @property int|null $numero
 * @property int|null $cadastro_completo
 * @property int|null $tipo_cadastro_id
 * @property int|null $situacao_id
 * @property int|null $cadastrado_por
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modificado_por
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\TipoCadastro $tipo_cadastro
 * @property \App\Model\Entity\Situaco $situaco
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Cliente extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'data_nascimento' => true,
        'cpf' => true,
        'telefone' => true,
        'email' => true,
        'cep' => true,
        'estado' => true,
        'cidade' => true,
        'bairro' => true,
        'rua' => true,
        'numero' => true,
        'cadastro_completo' => true,
        'tipo_cadastro_id' => true,
        'situacao_id' => true,
        'cadastrado_por' => true,
        'created' => true,
        'modificado_por' => true,
        'modified' => true,
        'tipo_cadastro' => true,
        'situaco' => true,
        'usuarios' => true,
    ];
}
