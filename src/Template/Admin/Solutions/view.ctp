<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Solution'), ['action' => 'edit', $solution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Solution'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Problems'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'add']) ?> </li>
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
</div>
