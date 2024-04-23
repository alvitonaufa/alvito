<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Like Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $tanggal_like
 * @property int $foto_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Foto $foto
 * @property \App\Model\Entity\User $user
 */
class Like extends Entity
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
        'tanggal_like' => true,
        'foto_id' => true,
        'user_id' => true,
        'foto' => true,
        'user' => true,
    ];
}
