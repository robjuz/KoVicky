<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mediafile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mediafile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mediafiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['controller' => 'Solutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
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