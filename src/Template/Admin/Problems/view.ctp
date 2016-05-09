<div class="col-xs-12">
    <div class="row">
    <div class="problem-image col-xs-12 col-sm-4 col-sm-push-8 text-center"><img src="/uploads/problems/photo/<?= $problem->photo_dir ?>/<?= $problem->photo ?>"></div>
        <div class="col-xs-12 col-sm-8 col-sm-pull-4">
            <table class="table">
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($problem->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Categories', 'action' => 'view', $problem->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($problem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($problem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($problem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>

    <hr>
    <h4><?= __('Thesis') ?></h4>
    <?= $problem->thesis; ?>
    <hr>
    <h4><?= __('Description') ?></h4>
    <?= $problem->description; ?>
    <hr>
    
    <div class="related">
        <h4><?= __('Related Solutions') ?></h4>
        <?php if (!empty($problem->solutions)): ?>
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($problem->solutions as $solution): ?>
            <tr>
                <td><?= h($solution->id) ?></td>
                <td id="description-cell"><?= strip_tags($solution->description) ?></td>
                <td><?= h($solution->created) ?></td>
                <td><?= h($solution->modified) ?></td>
                <td class="actions">
                    <?= $this->element('actionCell',['controller' => 'Solutions','item' => $solution]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
