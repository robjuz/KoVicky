<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\SolutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\SolutionsTable Test Case
 */
class SolutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Admin\Model\Table\SolutionsTable
     */
    public $Solutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.solutions',
        'plugin.admin.problems',
        'plugin.admin.users',
        'plugin.admin.categories',
        'plugin.admin.mediafiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Solutions') ? [] : ['className' => 'Admin\Model\Table\SolutionsTable'];
        $this->Solutions = TableRegistry::get('Solutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Solutions);

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
