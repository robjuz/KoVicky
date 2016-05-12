<div class="col-xs-12">
    <h3>
        <?= __('Problems') ?>
        <?= $this->Html->link([$this->Html->icon('plus'),__(' New problem')],['action' => 'edit'],['escape' => false, 'class' => 'btn btn-primary pull-right']) ?>
    </h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('related_problems') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('is_active',null,['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('is_main_problem',null,['direction' => 'desc']) ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($problems as $problem): ?>
            <tr>
                <td><?= $this->Number->format($problem->id) ?></td>
                <td><?php 
                    if ($problem->has('related_problems')) :
                        foreach ($problem->related_problems as $related_problem) :
                            echo $this->Html->link($related_problem->title.PHP_EOL, [
                                'prefix' => false,
                                'controller' => 'Problems', 
                                'action' => 'view', 
                                $related_problem->id
                                ]);
                        endforeach;
                    endif;
                ?></td>
                <td><?= h($problem->title) ?></td>
                <td><?= $problem->is_active ? $this->Html->icon('ok') : $this->Html->icon('remove') ?></td>
                <td><?= $problem->is_main_problem ? $this->Html->icon('ok') : $this->Html->icon('remove') ?></td>
                <td><?= h($problem->created) ?></td>
                <td><?= h($problem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->icon('eye-open'), [
                        'prefix' => false,
                        'action' => 'view', 
                        $problem->id
                    ],[
                        'escape' => false
                    ]) ?>
                    <?= $this->Html->link($this->Html->icon('edit'), [
                        'action' => 'edit', 
                        $problem->id
                    ], [
                    'escape' => false
                    ]) ?>
                    <?= $this->Form->postLink($this->Html->icon('trash'), [
                        'action' => 'delete', 
                        $problem->id
                    ], [
                    'confirm' => __('Are you sure you want to delete {0}?', $problem->title),
                    'escape' => false
                    ]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav class="text-center">
        <?= $this->Paginator->numbers(['prev' => '«', 'next' => '»']) ?>
    </nav>
</div>
