<div class="col-xs-12">
    <table class="table">
        <tr>
            <th><?= __('Solution') ?></th>
            <td><?= $mediafile->has('solution') ? $this->Html->link($mediafile->solution->id, ['controller' => 'Solutions', 'action' => 'view', $mediafile->solution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($mediafile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('File') ?></th>
            <td><?= h($mediafile->file) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($mediafile->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($mediafile->modified) ?></td>
        </tr>
    </table>
</div>
