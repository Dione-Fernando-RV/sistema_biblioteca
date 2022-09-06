<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CursoDisciplinasInstrutore Entity
 *
 * @property int $id
 * @property int|null $curso_disciplina_id
 * @property int|null $instrutores_id
 * @property int|null $curso_turma_id
 * @property int|null $situacao_id
 * @property int|null $cadastrado_por
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $modeificado_por
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\CursoDisciplina $curso_disciplina
 * @property \App\Model\Entity\Instrutore $instrutore
 * @property \App\Model\Entity\CursosTurma $cursos_turma
 * @property \App\Model\Entity\Situaco $situaco
 */
class CursoDisciplinasInstrutore extends Entity
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
