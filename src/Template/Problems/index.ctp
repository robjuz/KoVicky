<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="problems index large-9 medium-8 columns content">
    <h3><?= __('Problems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
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
                <td><?= $problem->has('user') ? $this->Html->link($problem->user->id, ['controller' => 'Users', 'action' => 'view', $problem->user->id]) : '' ?></td>
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
