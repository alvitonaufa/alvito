<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentar $komentar
 */
?>

<?php
$this->assign('title', __('Add Komentar'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentar'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($komentar, ['valueSources' => ['query', 'context']]) ?>
    <div class="card-body">
        <?= $this->Form->control('isi_komentar') ?>
        <?= $this->Form->control('tanggal') ?>
        <?= $this->Form->control('foto_id', ['options' => $foto, 'class' => 'form-control']) ?>
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