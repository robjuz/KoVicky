<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Problems List'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Users List'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Categories List'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'edit']) ?></li>
        <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?></li>
    </ul>
</nav>
<div class="problems form large-9 medium-8 columns content">
    <?= $this->Form->create($problem) ?>
    <fieldset>
        <legend><?= __('Edit Problem') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('title');
            echo $this->Form->input('thesis',['class' => 'wysiwyg']);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
