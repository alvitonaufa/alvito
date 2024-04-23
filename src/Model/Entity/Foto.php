<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Foto Entity
 *
 * @property int $id
 * @property string $judul
 * @property string $deskripsi
 * @property \Cake\I18n\Date $tanggal
 * @property string $lokasi_file
 * @property int $album_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Album $album
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Komentar[] $komentar
 * @property \App\Model\Entity\Like[] $like
 */
class Foto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'judul' => true,
        'foto' => true,
        'deskripsi' => true,
        'tanggal' => true,
        'lokasi_file' => true,
        'album_id' => true,
        'user_id' => true,
        'album' => true,
        'user' => true,
        'komentar' => true,
        'like' => true,
    ];
}
