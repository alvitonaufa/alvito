<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
?>

<?php
$this->assign('title', __('Add Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($foto,['enctype' =>'multipart/form-data'],['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('judul') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('tanggal') ?>
        <?= $this->Form->control('foto', ['type' => 'file']) ?>
        <?= $this->Form->control('album_id', ['options' => $album, 'class' => 'form-control']) ?>
        <?= $this->Form->control('user_id', ['options' => $user, 'class' => 'form-control']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>