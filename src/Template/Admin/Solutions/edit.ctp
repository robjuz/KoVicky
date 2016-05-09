<div class="col-xs-12">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Edit Solution') ?></legend>
        <?php
            echo $this->Form->input('problem_id', ['options' => $problems]);
            echo $this->Form->input('description',['class' => 'wysiwyg']);
        ?>
        <p style="margin: 1.125rem 0;">
            <div id="solution-dropzone" class="" data-action="/ko-vicky/admin/mediafiles/upload/<?= $solution->id ?>">
                <?php 
                if (!empty($solution->mediafiles)): ?>
                    <?php
                    foreach ($solution->mediafiles as $mediafile): ?>
                        
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
        </p>
        <p style="margin: 1.125rem 0;">
            <?= $this->Form->button(__('Submit')) ?>
        </p>
    </fieldset>
    <?= $this->Form->end() ?>
</div>


