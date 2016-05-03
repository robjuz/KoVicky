<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Solutions List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Problems List'), ['controller' => 'Problems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Users List'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Mediafiles List'), ['controller' => 'Mediafiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mediafile'), ['controller' => 'Mediafiles', 'action' => 'edit']) ?></li>
    </ul>
</nav>
<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Edit Solution') ?></legend>
        <?php
            echo $this->Form->input('problem_id', ['options' => $problems]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
