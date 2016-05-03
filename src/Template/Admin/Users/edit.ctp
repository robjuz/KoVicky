<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Users List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Mediafiles List'), ['controller' => 'Mediafiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mediafile'), ['controller' => 'Mediafiles', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Problems List'), ['controller' => 'Problems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
