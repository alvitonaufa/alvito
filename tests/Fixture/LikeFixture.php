<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikeFixture
 */
class LikeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'like';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tanggal_like' => '2024-04-23',
                'foto_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
