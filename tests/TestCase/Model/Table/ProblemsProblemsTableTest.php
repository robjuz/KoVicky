<?php
namespace KoVicky\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use KoVicky\Model\Table\ProblemsProblemsTable;

/**
 * KoVicky\Model\Table\ProblemsProblemsTable Test Case
 */
class ProblemsProblemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \KoVicky\Model\Table\ProblemsProblemsTable
     */
    public $ProblemsProblems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ko_vicky.problems_problems',
        'plugin.ko_vicky.problems',
        'plugin.ko_vicky.mediafiles',
        'plugin.ko_vicky.users',
        'plugin.ko_vicky.related_problems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProblemsProblems') ? [] : ['className' => 'KoVicky\Model\Table\ProblemsProblemsTable'];
        $this->ProblemsProblems = TableRegistry::get('ProblemsProblems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProblemsProblems);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
