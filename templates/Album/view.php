<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
?>

<?php
$this->assign('title', __('Album'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Album'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($album->Nama) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama') ?></th>
                <td><?= h($album->Nama) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $album->has('user') ? $this->Html->link($album->user->username, ['controller' => 'User', 'action' => 'view', $album->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($album->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal') ?></th>
                <td><?= h($album->tanggal) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $album->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $album->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($album->deskripsi)); ?>
    </div>
</div>

<div class="related related-foto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Foto') ?></h3>
        <div class="ml-auto">
            <?= $this->Html->link(__('New Foto'), ['controller' => 'Foto', 'action' => 'add', '?' => ['album_id' => $album->id]], ['class' => 'btn btn-primary btn-sm']) ?>
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
            <?php if (empty($album->foto)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Foto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($album->foto as $foto) : ?>
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
