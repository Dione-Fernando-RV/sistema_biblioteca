<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SituacoesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SituacoesTable Test Case
 */
class SituacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SituacoesTable
     */
    protected $Situacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Situacoes') ? [] : ['className' => SituacoesTable::class];
        $this->Situacoes = $this->getTableLocator()->get('Situacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Situacoes);

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
}
