<div class="col-xs-12">
    <?= $this->Form->create($problem,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
            <div class="row">
                <div class="problem-image col-xs-12 col-sm-6 col-sm-push-6 text-center">
                    <div id="image-upload" data-image-url="<?= $problem->photo ?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $this->Form->input('title'); ?>
                        </div>
                        <div class="col-xs-12">
                            <?= $this->Form->input('parent_id', ['options' => $parentProblems, 'empty' => true]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->input('description',['class' => 'wysiwyg']); ?>
            <div id="problem-dropzone" class="" data-action="/ko-vicky/admin/mediafiles/upload/<?= $problem->id ?>">
                <?php 
                if (!empty($problem->mediafiles)): ?>
                    <?php
                    foreach ($problem->mediafiles as $mediafile): ?>
                        
                            <div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  
                                <div class="dz-image">
                                    <img data-dz-thumbnail="" alt="<?= $mediafile->file_name ?>" src="<?= $mediafile->file_url ?>" style="width: 100%">
                                </div>  
                                <div class="dz-details">     
                                    <div class="dz-filename">
                                        <span data-dz-name="">
                                            <?= $this->Html->link($mediafile->file_name, $mediafile->file_url,['target' => 'blank']) ?>
                                        </span>
                                    </div>  
                                </div>  
                            </div>
                    <?php 
                    endforeach; ?>
                <?php
                endif;
                ?>
                <div class="dz-default dz-message">
                    <span>
                        <?= __('Drop files here to upload') ?>
                    </span>
                </div>
            </div>
            <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
