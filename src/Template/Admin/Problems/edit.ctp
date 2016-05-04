<div class="problems form large-9 medium-8 columns content">
    <?= $this->Form->create($problem) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('parent_id', ['options' => $parentProblems, 'empty' => true]);
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('thesis',['class' => 'wysiwyg']);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
