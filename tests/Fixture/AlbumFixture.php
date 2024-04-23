<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlbumFixture
 */
class AlbumFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'album';
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
                'Nama' => 'Lorem ipsum dolor sit amet',
                'deskripsi' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'tanggal' => '2024-04-23',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
