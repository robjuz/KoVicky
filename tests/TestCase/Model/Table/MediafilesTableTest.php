<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediafilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediafilesTable Test Case
 */
class MediafilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediafilesTable
     */
    public $Mediafiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mediafiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mediafiles') ? [] : ['className' => 'App\Model\Table\MediafilesTable'];
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
}
