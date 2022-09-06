<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoCursoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoCursoTable Test Case
 */
class TipoCursoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoCursoTable
     */
    protected $TipoCurso;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoCurso',
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
        $config = $this->getTableLocator()->exists('TipoCurso') ? [] : ['className' => TipoCursoTable::class];
        $this->TipoCurso = $this->getTableLocator()->get('TipoCurso', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoCurso);

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
