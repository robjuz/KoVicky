<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Problems'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Problems') ?></h4>
        <?php if (!empty($user->problems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Thesis') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->problems as $problems): ?>
            <tr>
                <td><?= h($problems->id) ?></td>
                <td><?= h($problems->user_id) ?></td>
                <td><?= h($problems->category_id) ?></td>
                <td><?= h($problems->title) ?></td>
                <td><?= h($problems->thesis) ?></td>
                <td><?= h($problems->description) ?></td>
                <td><?= h($problems->created) ?></td>
                <td><?= h($problems->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Problems', 'action' => 'view', $problems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Problems', 'action' => 'edit', $problems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Problems', 'action' => 'delete', $problems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $problems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
