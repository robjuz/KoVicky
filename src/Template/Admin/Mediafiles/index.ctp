<div class="col-xs-12">
    <h3><?= __('Mediafiles') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('solution_id') ?></th>
                <th><?= $this->Paginator->sort('file') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mediafiles as $mediafile): ?>
            <tr>
                <td><?= $this->Number->format($mediafile->id) ?></td>
                <td><?= $mediafile->has('solution') ? $this->Html->link($mediafile->solution->id, ['controller' => 'Solutions', 'action' => 'view', $mediafile->solution->id]) : '' ?></td>
                <td><?= h($mediafile->file_url) ?></td>
                <td><?= h($mediafile->created) ?></td>
                <td><?= h($mediafile->modified) ?></td>
                <td class="actions">
                    <?= $this->element('actionCell',['controller' => 'Mediafiles','item' => $mediafile]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>
