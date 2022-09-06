<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstrutoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstrutoresTable Test Case
 */
class InstrutoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InstrutoresTable
     */
    protected $Instrutores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Instrutores',
        'app.Escolaridades',
        'app.Situacoes',
        'app.CursoDisciplinas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Instrutores') ? [] : ['className' => InstrutoresTable::class];
        $this->Instrutores = $this->getTableLocator()->get('Instrutores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Instrutores);

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
