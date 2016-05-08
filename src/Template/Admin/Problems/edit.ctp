<?php
$this->Form->templates([
   'fileContainer' => '<div id="problem-image"><div id="image-container"><img src="/uploads/problems/photo/'.$problem->photo_dir.'/'.$problem->photo.'"></div>{{content}}</div>'
]);
?>
<div class="col-xs-12">
    <?= $this->Form->create($problem,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
            <div class="row">
                <div class="col-xs-8">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $this->Form->input('title'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?= $this->Form->input('parent_id', ['options' => $parentProblems, 'empty' => true]); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?= $this->Form->input('category_id', ['options' => $categories]); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <?= $this->Form->input('photo',['type' => 'file', 'label' => false]); ?>
                </div>
            </div>
            <?= $this->Form->input('thesis',['class' => 'wysiwyg']); ?>
            <?= $this->Form->input('description',['class' => 'wysiwyg']); ?>
    
        <p style="margin:1.125rem 0;">
            <?= $this->Form->button(__('Submit')) ?>
        </p>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
