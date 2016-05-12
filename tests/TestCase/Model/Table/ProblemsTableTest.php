<?php
namespace KoVicky\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use KoVicky\Model\Table\ProblemsTable;

/**
 * KoVicky\Model\Table\ProblemsTable Test Case
 */
class ProblemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \KoVicky\Model\Table\ProblemsTable
     */
    public $Problems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ko_vicky.problems',
        'plugin.ko_vicky.users',
        'plugin.ko_vicky.mediafiles',
        'plugin.ko_vicky.solutions',
        'plugin.ko_vicky.ko_vicky_mediafiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Problems') ? [] : ['className' => 'KoVicky\Model\Table\ProblemsTable'];
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
