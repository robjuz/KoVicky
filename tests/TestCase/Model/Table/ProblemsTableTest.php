<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProblemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProblemsTable Test Case
 */
class ProblemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProblemsTable
     */
    public $Problems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.problems',
        'app.users',
        'app.categories',
        'app.solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Problems') ? [] : ['className' => 'App\Model\Table\ProblemsTable'];
        $this->Problems = TableRegistry::get('Problems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Problems);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
