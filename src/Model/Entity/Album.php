<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Album Entity
 *
 * @property int $id
 * @property string $Nama
 * @property string $deskripsi
 * @property \Cake\I18n\Date $tanggal
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Foto[] $foto
 */
class Album extends Entity
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
        'Nama' => true,
        'deskripsi' => true,
        'tanggal' => true,
        'user_id' => true,
        'user' => true,
        'foto' => true,
    ];
}
