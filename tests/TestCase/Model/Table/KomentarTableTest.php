<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KomentarTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KomentarTable Test Case
 */
class KomentarTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KomentarTable
     */
    protected $Komentar;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Komentar',
        'app.Foto',
        'app.User',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Komentar') ? [] : ['className' => KomentarTable::class];
        $this->Komentar = $this->getTableLocator()->get('Komentar', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Komentar);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KomentarTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\KomentarTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
