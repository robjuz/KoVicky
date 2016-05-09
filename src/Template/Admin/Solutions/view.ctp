<div class="col-xs-12">
    <table class="table">
        <tr>
            <th><?= __('Problem') ?></th>
            <td><?= $solution->has('problem') ? $this->Html->link($solution->problem->title, ['controller' => 'Problems', 'action' => 'view', $solution->problem->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($solution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($solution->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($solution->modified) ?></td>
        </tr>
    </table>

    <hr>
    <h4><?= __('Description') ?></h4>
    <?= $solution->description; ?>
    <hr>

    <div class="related">
        <h4><?= __('Related Mediafiles') ?></h4>
        <?php if (!empty($solution->mediafiles)): ?>
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('File') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($solution->mediafiles as $mediafile): ?>
            <tr>
                <td><?= h($mediafile->id) ?></td>
                <td><?= h($mediafile->file) ?></td>
                <td><?= h($mediafile->created) ?></td>
                <td><?= h($mediafile->modified) ?></td>
                <td class="actions">
                    <?= $this->element('actionCell',['controller' => 'Mefiafiles','item' => $mediafile]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
