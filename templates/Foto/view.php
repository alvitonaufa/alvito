<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
?>

<?php
$this->assign('title', __('Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($foto->judul) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Judul') ?></th>
                <td><?= h($foto->judul) ?></td>
            </tr>
            <tr>
                <th><?= __('Lokasi File') ?></th>
                <td><?= h($foto->lokasi_file) ?></td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $foto->has('album') ? $this->Html->link($foto->album->Nama, ['controller' => 'Album', 'action' => 'view', $foto->album->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $foto->has('user') ? $this->Html->link($foto->user->username, ['controller' => 'User', 'action' => 'view', $foto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($foto->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal') ?></th>
                <td><?= h($foto->tanggal) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($foto->deskripsi)); ?>
    </div>
</div>

<div class="related related-komentar view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Komentar') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Komentar'), ['controller' => 'Komentar', 'action' => 'add', '?' => ['foto_id' => $foto->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($foto->komentar)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Komentar record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($foto->komentar as $komentar) : ?>
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
            <?= $this->Html->link(__('New Like'), ['controller' => 'Like', 'action' => 'add', '?' => ['foto_id' => $foto->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($foto->like)) : ?>
                <tr>
                    <td colspan="5" class="text-muted">
                        <?= __('Like record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($foto->like as $like) : ?>
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
