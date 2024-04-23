<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List User'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->username) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Nama Lengkap') ?></th>
                <td><?= h($user->nama_lengkap) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($user->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Alamat') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($user->alamat)); ?>
    </div>
</div>

<div class="related related-album view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Album') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Album'), ['controller' => 'Album', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Album'), ['controller' => 'Album', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nama') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tanggal') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->album)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Album record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->album as $album) : ?>
                    <tr>
                        <td><?= h($album->id) ?></td>
                        <td><?= h($album->Nama) ?></td>
                        <td><?= h($album->deskripsi) ?></td>
                        <td><?= h($album->tanggal) ?></td>
                        <td><?= h($album->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Album', 'action' => 'view', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Album', 'action' => 'edit', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Album', 'action' => 'delete', $album->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-foto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Foto') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Foto'), ['controller' => 'Foto', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Foto'), ['controller' => 'Foto', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Judul') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tanggal') ?></th>
                <th><?= __('Lokasi File') ?></th>
                <th><?= __('Album Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->foto)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Foto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->foto as $foto) : ?>
                    <tr>
                        <td><?= h($foto->id) ?></td>
                        <td><?= h($foto->judul) ?></td>
                        <td><?= h($foto->deskripsi) ?></td>
                        <td><?= h($foto->tanggal) ?></td>
                        <td><?= h($foto->lokasi_file) ?></td>
                        <td><?= h($foto->album_id) ?></td>
                        <td><?= h($foto->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Foto', 'action' => 'view', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Foto', 'action' => 'edit', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Foto', 'action' => 'delete', $foto->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-komentar view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Komentar') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Komentar'), ['controller' => 'Komentar', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Komentar'), ['controller' => 'Komentar', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Isi Komentar') ?></th>
                <th><?= __('Tanggal') ?></th>
                <th><?= __('Foto Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->komentar)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Komentar record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->komentar as $komentar) : ?>
                    <tr>
                        <td><?= h($komentar->id) ?></td>
                        <td><?= h($komentar->isi_komentar) ?></td>
                        <td><?= h($komentar->tanggal) ?></td>
                        <td><?= h($komentar->foto_id) ?></td>
                        <td><?= h($komentar->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Komentar', 'action' => 'view', $komentar->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Komentar', 'action' => 'edit', $komentar->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Komentar', 'action' => 'delete', $komentar->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $komentar->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-like view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Like') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Like'), ['controller' => 'Like', 'action' => 'add', '?' => ['user_id' => $user->id]], ['class' => 'btn btn-primary btn-sm']) ?>
            <?= $this->Html->link(__('List Like'), ['controller' => 'Like', 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tanggal Like') ?></th>
                <th><?= __('Foto Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php if (empty($user->like)) : ?>
                <tr>
                    <td colspan="5" class="text-muted">
                        <?= __('Like record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->like as $like) : ?>
                    <tr>
                        <td><?= h($like->id) ?></td>
                        <td><?= h($like->tanggal_like) ?></td>
                        <td><?= h($like->foto_id) ?></td>
                        <td><?= h($like->user_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Like', 'action' => 'view', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Like', 'action' => 'edit', $like->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Like', 'action' => 'delete', $like->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
