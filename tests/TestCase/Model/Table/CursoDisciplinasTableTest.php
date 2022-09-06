<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursoDisciplinasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursoDisciplinasTable Test Case
 */
class CursoDisciplinasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CursoDisciplinasTable
     */
    protected $CursoDisciplinas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CursoDisciplinas',
        'app.Cursos',
        'app.Situacoes',
        'app.Instrutores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CursoDisciplinas') ? [] : ['className' => CursoDisciplinasTable::class];
        $this->CursoDisciplinas = $this->getTableLocator()->get('CursoDisciplinas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CursoDisciplinas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
