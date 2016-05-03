<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('Users List'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Mediafiles List'), ['controller' => 'Mediafiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mediafile'), ['controller' => 'Mediafiles', 'action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Problems List'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'edit']) ?> </li>
        <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?> </li>
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
        <h4><?= __('Related Mediafiles') ?></h4>
        <?php if (!empty($user->mediafiles)): ?>
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
            <?php foreach ($user->mediafiles as $mediafiles): ?>
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
    <div class="related">
        <h4><?= __('Related Solutions') ?></h4>
        <?php if (!empty($user->solutions)): ?>
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
            <?php foreach ($user->solutions as $solutions): ?>
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
