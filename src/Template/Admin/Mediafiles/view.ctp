<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mediafile'), ['action' => 'edit', $mediafile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mediafile'), ['action' => 'delete', $mediafile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediafile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mediafiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mediafile'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mediafiles view large-9 medium-8 columns content">
    <h3><?= h($mediafile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('File') ?></th>
            <td><?= h($mediafile->file) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($mediafile->id) ?></td>
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
