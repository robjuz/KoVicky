<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\ProblemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\ProblemsTable Test Case
 */
class ProblemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Admin\Model\Table\ProblemsTable
     */
    public $Problems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.problems',
        'plugin.admin.users',
        'plugin.admin.categories',
        'plugin.admin.solutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Problems') ? [] : ['className' => 'Admin\Model\Table\ProblemsTable'];
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
