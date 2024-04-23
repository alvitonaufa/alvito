<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentar $komentar
 */
?>

<?php
$this->assign('title', __('Komentar'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentar'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($komentar->id) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Foto') ?></th>
                <td><?= $komentar->has('foto') ? $this->Html->link($komentar->foto->judul, ['controller' => 'Foto', 'action' => 'view', $komentar->foto->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $komentar->has('user') ? $this->Html->link($komentar->user->username, ['controller' => 'User', 'action' => 'view', $komentar->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($komentar->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tanggal') ?></th>
                <td><?= h($komentar->tanggal) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $komentar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $komentar->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $komentar->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Isi Komentar') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($komentar->isi_komentar)); ?>
    </div>
</div>
