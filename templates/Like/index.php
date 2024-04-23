<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Like[]|\Cake\Collection\CollectionInterface $like
 */
?>

<?php
$this->assign('title', __('Like'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Like')],
]);
?>

<div class="card card-primary card-outline">
    <div class="card-header d-flex flex-column flex-md-row">
        <h2 class="card-title">
            <!-- -->
        </h2>
        <div class="d-flex ml-auto">
            <?= $this->Paginator->limitControl([], null, [
                'label' => false,
                'class' => 'form-control form-control-sm',
                'templates' => ['inputContainer' => '{{content}}']
            ]); ?>
            <?= $this->Html->link(__('New Like'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm ml-2']) ?>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tanggal_like') ?></th>
                    <th><?= $this->Paginator->sort('foto_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($like as $like) : ?>
                    <tr>
                        <td><?= $this->Number->format($like->id) ?></td>
                        <td><?= h($like->tanggal_like) ?></td>
                        <td><?= $like->has('foto') ? $this->Html->link($like->foto->judul, ['controller' => 'Foto', 'action' => 'view', $like->foto->id]) : '' ?></td>
                        <td><?= $like->has('user') ? $this->Html->link($like->user->username, ['controller' => 'User', 'action' => 'view', $like->user->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $like->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $like->id], ['class' => 'btn btn-xs btn-outline-primary', 'escape' => false]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $like->id], ['class' => 'btn btn-xs btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $like->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer d-flex flex-column flex-md-row">
        <div class="text-muted">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </div>
        <ul class="pagination pagination-sm mb-0 ml-auto">
            <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>
    <!-- /.card-footer -->
</div>