<?php
namespace KoVicky\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use KoVicky\Model\Table\ProblemsTagsTable;

/**
 * KoVicky\Model\Table\ProblemsTagsTable Test Case
 */
class ProblemsTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \KoVicky\Model\Table\ProblemsTagsTable
     */
    public $ProblemsTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.ko_vicky.problems_tags',
        'plugin.ko_vicky.problems',
        'plugin.ko_vicky.mediafiles',
        'plugin.ko_vicky.users',
        'plugin.ko_vicky.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProblemsTags') ? [] : ['className' => 'KoVicky\Model\Table\ProblemsTagsTable'];
        $this->ProblemsTags = TableRegistry::get('ProblemsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProblemsTags);

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
