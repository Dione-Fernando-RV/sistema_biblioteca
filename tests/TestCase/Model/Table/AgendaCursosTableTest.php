<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgendaCursosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgendaCursosTable Test Case
 */
class AgendaCursosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgendaCursosTable
     */
    protected $AgendaCursos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AgendaCursos',
        'app.Cursos',
        'app.Situacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AgendaCursos') ? [] : ['className' => AgendaCursosTable::class];
        $this->AgendaCursos = $this->getTableLocator()->get('AgendaCursos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AgendaCursos);

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
