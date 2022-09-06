<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Instrutore Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property \Cake\I18n\FrozenDate|null $data_nascimento
 * @property string|null $cpf
 * @property string|null $telefone
 * @property string|null $cep
 * @property string|null $estado
 * @property string|null $cidade
 * @property string|null $rua
 * @property int|null $numero
 * @property string|null $bairro
 * @property string|null $formacao
 * @property int|null $escolaridade_id
 * @property string|null $curriculo_lattes
 * @property int|null $situacao_id
 * @property int|null $cadastrado_por
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modeificado_por
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Escolaridade $escolaridade
 * @property \App\Model\Entity\Situaco $situaco
 * @property \App\Model\Entity\CursoDisciplina[] $curso_disciplinas
 */
class Instrutore extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
