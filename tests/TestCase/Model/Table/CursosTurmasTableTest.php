<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursosTurmasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursosTurmasTable Test Case
 */
class CursosTurmasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CursosTurmasTable
     */
    protected $CursosTurmas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CursosTurmas',
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
        $config = $this->getTableLocator()->exists('CursosTurmas') ? [] : ['className' => CursosTurmasTable::class];
        $this->CursosTurmas = $this->getTableLocator()->get('CursosTurmas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CursosTurmas);

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
