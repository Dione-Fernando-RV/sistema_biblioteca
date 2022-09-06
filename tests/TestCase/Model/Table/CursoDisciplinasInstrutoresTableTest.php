<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursoDisciplinasInstrutoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursoDisciplinasInstrutoresTable Test Case
 */
class CursoDisciplinasInstrutoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CursoDisciplinasInstrutoresTable
     */
    protected $CursoDisciplinasInstrutores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CursoDisciplinasInstrutores',
        'app.CursoDisciplinas',
        'app.Instrutores',
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
        $config = $this->getTableLocator()->exists('CursoDisciplinasInstrutores') ? [] : ['className' => CursoDisciplinasInstrutoresTable::class];
        $this->CursoDisciplinasInstrutores = $this->getTableLocator()->get('CursoDisciplinasInstrutores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CursoDisciplinasInstrutores);

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
