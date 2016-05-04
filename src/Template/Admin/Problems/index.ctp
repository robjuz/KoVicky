<div class="problems index large-9 medium-8 columns content">
    <h3><?= __('Problems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($problems as $problem): ?>
            <tr>
                <td><?= $this->Number->format($problem->id) ?></td>
                <td><?= $problem->has('parent_problem') ? $this->Html->link($problem->parent_problem->title, ['controller' => 'Problems', 'action' => 'view', $problem->parent_problem->id]) : '' ?></td>
                <td><?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Categories', 'action' => 'view', $problem->category->id]) : '' ?></td>
                <td><?= h($problem->title) ?></td>
                <td><?= h($problem->created) ?></td>
                <td><?= h($problem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $problem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $problem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $problem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problem->id)]) ?>
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
