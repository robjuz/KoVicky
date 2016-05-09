<div class="col-xs-12">
    <?= $this->Form->create($problem,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
            <div class="row">
                <div class="problem-image col-xs-12 col-sm-6 col-sm-push-6 text-center">
                    <div id="image-upload">
                        <img class="img-responsive" src="<?= $problem->photo ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-pull-6">
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
            </div>
            <?= $this->Form->hidden('photo',['id'=>'photo-url']) ?>
            <?= $this->Form->input('thesis',['class' => 'wysiwyg']); ?>
            <?= $this->Form->input('description',['class' => 'wysiwyg']); ?>
    
        <p style="margin:1.125rem 0;">
            <?= $this->Form->button(__('Submit')) ?>
        </p>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
