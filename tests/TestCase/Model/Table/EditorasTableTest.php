<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EditorasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EditorasTable Test Case
 */
class EditorasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EditorasTable
     */
    protected $Editoras;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Editoras',
        'app.Situacoes',
        'app.Livros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Editoras') ? [] : ['className' => EditorasTable::class];
        $this->Editoras = $this->getTableLocator()->get('Editoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Editoras);

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
