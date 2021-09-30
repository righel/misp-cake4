<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServersTable Test Case
 */
class ServersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServersTable
     */
    protected $Servers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Servers',
        'app.Orgs',
        'app.RemoteOrgs',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Servers') ? [] : ['className' => ServersTable::class];
        $this->Servers = $this->getTableLocator()->get('Servers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Servers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ServersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
