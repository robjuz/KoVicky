<div class="col-xs-12">
    <h3><?= __('Problems') ?></h3>
    <table class="table table-striped">
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
                    <?= $this->element('actionCell',['controller' => 'Problems','item' => $problem]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>
