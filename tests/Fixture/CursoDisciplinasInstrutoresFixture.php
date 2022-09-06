<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CursoDisciplinasInstrutoresFixture
 */
class CursoDisciplinasInstrutoresFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'curso_disciplina_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'instrutores_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'curso_turma_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'situacao_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '1 - ativo  2 - desativado', 'precision' => null, 'autoIncrement' => null],
        'cadastrado_por' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modeificado_por' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'instrutores_id' => ['type' => 'index', 'columns' => ['instrutores_id'], 'length' => []],
            'cadastrado_por' => ['type' => 'index', 'columns' => ['cadastrado_por'], 'length' => []],
            'modeificado_por' => ['type' => 'index', 'columns' => ['modeificado_por'], 'length' => []],
            'curso_disciplina_id' => ['type' => 'index', 'columns' => ['curso_disciplina_id'], 'length' => []],
            'curso_turma_id' => ['type' => 'index', 'columns' => ['curso_turma_id'], 'length' => []],
            'situacao_id' => ['type' => 'index', 'columns' => ['situacao_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'curso_disciplinas_instrutores_ibfk_7' => ['type' => 'foreign', 'columns' => ['situacao_id'], 'references' => ['situacoes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'curso_disciplinas_instrutores_ibfk_6' => ['type' => 'foreign', 'columns' => ['curso_turma_id'], 'references' => ['cursos_turmas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'curso_disciplinas_instrutores_ibfk_5' => ['type' => 'foreign', 'columns' => ['curso_disciplina_id'], 'references' => ['curso_disciplinas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'curso_disciplinas_instrutores_ibfk_4' => ['type' => 'foreign', 'columns' => ['modeificado_por'], 'references' => ['usuarios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'curso_disciplinas_instrutores_ibfk_3' => ['type' => 'foreign', 'columns' => ['cadastrado_por'], 'references' => ['usuarios', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'curso_disciplinas_instrutores_ibfk_2' => ['type' => 'foreign', 'columns' => ['instrutores_id'], 'references' => ['instrutores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'curso_disciplina_id' => 1,
                'instrutores_id' => 1,
                'curso_turma_id' => 1,
                'situacao_id' => 1,
                'cadastrado_por' => 1,
                'created' => '2021-07-21 02:49:35',
                'modeificado_por' => 1,
                'modified' => '2021-07-21 02:49:35',
            ],
        ];
        parent::init();
    }
}
