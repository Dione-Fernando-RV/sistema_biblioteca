<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgendaCurso Entity
 *
 * @property int $id
 * @property int|null $curso_id
 * @property \Cake\I18n\FrozenDate|null $data_inicio
 * @property \Cake\I18n\FrozenDate|null $data_fim
 * @property int|null $carga_horaria
 * @property string|null $estado
 * @property string|null $cidade
 * @property string|null $local
 * @property int|null $tipo
 * @property int|null $situacao_id
 * @property int|null $cadastrado_por
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modeificado_por
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Curso $curso
 * @property \App\Model\Entity\Situaco $situaco
 */
class AgendaCurso extends Entity
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
