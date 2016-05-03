<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Problem'), ['action' => 'edit', $problem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Problem'), ['action' => 'delete', $problem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problem->id)]) ?> </li>
        <li><?= $this->Html->link(__('Problems List'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Users List'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Categories List'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?> </li>
    </ul>
</nav>
<div class="problems view large-9 medium-8 columns content">
    <h3><?= h($problem->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $problem->has('user') ? $this->Html->link($problem->user->id, ['controller' => 'Users', 'action' => 'view', $problem->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Categories', 'action' => 'view', $problem->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($problem->title) ?></td>
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
    <div class="row">
        <h4><?= __('Thesis') ?></h4>
        <?= $this->Text->autoParagraph(h($problem->thesis)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($problem->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Solutions') ?></h4>
        <?php if (!empty($problem->solutions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Problem Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($problem->solutions as $solutions): ?>
            <tr>
                <td><?= h($solutions->id) ?></td>
                <td><?= h($solutions->problem_id) ?></td>
                <td><?= h($solutions->user_id) ?></td>
                <td><?= h($solutions->description) ?></td>
                <td><?= h($solutions->created) ?></td>
                <td><?= h($solutions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Solutions', 'action' => 'view', $solutions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Solutions', 'action' => 'edit', $solutions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Solutions', 'action' => 'delete', $solutions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solutions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
