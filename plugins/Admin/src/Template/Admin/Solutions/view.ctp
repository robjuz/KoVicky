<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solution'), ['action' => 'edit', $solution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solution'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Problems'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mediafiles'), ['controller' => 'Mediafiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mediafile'), ['controller' => 'Mediafiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="solutions view large-9 medium-8 columns content">
    <h3><?= h($solution->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Problem') ?></th>
            <td><?= $solution->has('problem') ? $this->Html->link($solution->problem->title, ['controller' => 'Problems', 'action' => 'view', $solution->problem->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $solution->has('user') ? $this->Html->link($solution->user->id, ['controller' => 'Users', 'action' => 'view', $solution->user->id]) : '' ?></td>
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
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($solution->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mediafiles') ?></h4>
        <?php if (!empty($solution->mediafiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Solution Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('File') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($solution->mediafiles as $mediafiles): ?>
            <tr>
                <td><?= h($mediafiles->id) ?></td>
                <td><?= h($mediafiles->solution_id) ?></td>
                <td><?= h($mediafiles->user_id) ?></td>
                <td><?= h($mediafiles->file) ?></td>
                <td><?= h($mediafiles->created) ?></td>
                <td><?= h($mediafiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Mediafiles', 'action' => 'view', $mediafiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Mediafiles', 'action' => 'edit', $mediafiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Mediafiles', 'action' => 'delete', $mediafiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediafiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
