<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Problems'), ['controller' => 'Problems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutions index large-9 medium-8 columns content">
    <h3><?= __('Solutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('problem_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutions as $solution): ?>
            <tr>
                <td><?= $this->Number->format($solution->id) ?></td>
                <td><?= $solution->has('problem') ? $this->Html->link($solution->problem->title, ['controller' => 'Problems', 'action' => 'view', $solution->problem->id]) : '' ?></td>
                <td><?= h($solution->created) ?></td>
                <td><?= h($solution->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $solution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?>
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