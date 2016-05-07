<?php
$this->Form->templates([
   'fileContainer' => '<div id="problem-image"><div><img src="/uploads/problems/photo/'.$problem->photo_dir.'/'.$problem->photo.'"></div>{{content}}</div>'
]);
?>
<div class="problems form large-9 medium-8 columns content">
    <?= $this->Form->create($problem,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
        <?php
            echo $this->Html->image($problem->photo_dir.'/<prefix>_'.$problem->photo);
            echo $this->Form->input('photo',['type' => 'file', 'label' => false]);
            echo $this->Form->input('title', ['style' => 'width: 75%']);
            echo $this->Form->input('parent_id', ['options' => $parentProblems, 'empty' => true, 'style' => 'width: 75%']);
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('thesis',['class' => 'wysiwyg']);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
        <p style="margin:1.125rem 0;">
            <?= $this->Form->button(__('Submit')) ?>
        </p>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
