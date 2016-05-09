<div class="col-xs-12">
    <h3><?= __('Solutions') ?></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('problem_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
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
                <td><?= $solution->is_active ? 'YES' : 'NO' ?></td>
                <td class="actions">
                    <?= $this->element('actionCell',['controller' => 'Solutions','item' => $solution]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>
