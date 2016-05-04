<?php
namespace koVicky\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use koVicky\Model\Table\KovickyCategoriesTable;

/**
 * koVicky\Model\Table\KovickyCategoriesTable Test Case
 */
class KovickyCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \koVicky\Model\Table\KovickyCategoriesTable
     */
    public $KovickyCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ko_vicky.kovicky_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('KovickyCategories') ? [] : ['className' => 'koVicky\Model\Table\KovickyCategoriesTable'];
        $this->KovickyCategories = TableRegistry::get('KovickyCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KovickyCategories);

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
