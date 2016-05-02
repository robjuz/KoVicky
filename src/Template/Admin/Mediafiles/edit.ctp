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
    </ul>
</nav>
<div class="mediafiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mediafile) ?>
    <fieldset>
        <legend><?= __('Edit Mediafile') ?></legend>
        <?php
            echo $this->Form->input('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
