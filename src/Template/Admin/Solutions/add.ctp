<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Problems'), ['controller' => 'Problems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Add Solution') ?></legend>
        <?php
            echo $this->Form->input('problem_id', ['options' => $problems, 'empty' => true]);
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>