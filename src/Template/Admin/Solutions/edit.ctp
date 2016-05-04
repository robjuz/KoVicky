<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Edit Solution') ?></legend>
        <?php
            echo $this->Form->input('problem_id', ['options' => $problems]);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <?= $this->Form->create(null,['type' => 'file', 'class' => 'dropzone', 'url' => ['controller' => 'Mediafiles', 'action' => 'upload', $solution->id]]) ?>
    <?= $this->Form->end() ?>
</div>
