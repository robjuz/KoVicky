<?php
namespace Admin\Test\TestCase\Model\Table;

use Admin\Model\Table\MediafilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Admin\Model\Table\MediafilesTable Test Case
 */
class MediafilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Admin\Model\Table\MediafilesTable
     */
    public $Mediafiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.mediafiles',
        'plugin.admin.solutions',
        'plugin.admin.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mediafiles') ? [] : ['className' => 'Admin\Model\Table\MediafilesTable'];
        $this->Mediafiles = TableRegistry::get('Mediafiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mediafiles);

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
