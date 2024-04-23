<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FotoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FotoTable Test Case
 */
class FotoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FotoTable
     */
    protected $Foto;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Foto',
        'app.Album',
        'app.User',
        'app.Komentar',
        'app.Like',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Foto') ? [] : ['className' => FotoTable::class];
        $this->Foto = $this->getTableLocator()->get('Foto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Foto);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FotoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FotoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
