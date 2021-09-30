<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSettingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSettingsTable Test Case
 */
class UserSettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSettingsTable
     */
    protected $UserSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UserSettings',
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
        $config = $this->getTableLocator()->exists('UserSettings') ? [] : ['className' => UserSettingsTable::class];
        $this->UserSettings = $this->getTableLocator()->get('UserSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UserSettings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UserSettingsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UserSettingsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
