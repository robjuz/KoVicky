<div class="mediafiles index large-9 medium-8 columns content">
    <h3><?= __('Mediafiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mediafile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mediafile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mediafile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediafile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
