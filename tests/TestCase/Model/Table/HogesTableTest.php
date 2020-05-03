<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HogesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HogesTable Test Case
 */
class HogesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HogesTable
     */
    protected $Hoges;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hoges',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Hoges') ? [] : ['className' => HogesTable::class];
        $this->Hoges = TableRegistry::getTableLocator()->get('Hoges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hoges);

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
}
