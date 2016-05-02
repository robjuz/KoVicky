<div class="well">
    <h3>
        <?= h($problem->title) ?>
        <small>
            <?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Categories', 'action' => 'view', $problem->category->id]) : '' ?>
        </small>
    </h3>
</div>

<div class="well">
    <?= $this->Text->autoParagraph(h($problem->thesis)); ?>
</div>

<div class="well">
    <?= $this->Text->autoParagraph(h($problem->description)); ?>
</div>
    <table class="vertical-table">

        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($problem->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($problem->modified) ?></td>
        </tr>
    </table>
    <div id="solutions">
        <div class="well">
            <h4><?= __('Related Solutions') ?></h4>

        <?php if (!empty($problem->solutions)): ?>
            <?php foreach ($problem->solutions as $solution): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $solution->id ?> </div>
                    <div class="panel-body">
                        <?= $solution->description ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
