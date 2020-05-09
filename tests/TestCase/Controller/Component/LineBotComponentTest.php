<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;
use App\Controller\Component\LineBotComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\LineBotComponent Test Case
 */
class LineBotComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\LineBotComponent
     */
    protected $LineBot;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->LineBot = new LineBotComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LineBot);

        parent::tearDown();
    }
}
