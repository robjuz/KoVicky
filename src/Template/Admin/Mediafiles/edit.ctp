<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Mediafiles List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Users List'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'edit']) ?></li>
    </ul>
</nav>
<div class="mediafiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mediafile) ?>
    <fieldset>
        <legend><?= __('Edit Mediafile') ?></legend>
        <?php
            echo $this->Form->input('solution_id', ['options' => $solutions]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
