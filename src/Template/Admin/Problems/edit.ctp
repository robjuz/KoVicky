
<!-- Modal -->
<div class="modal fade" id="croppingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crop Header Image</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Crop</button>
      </div>
    </div>
  </div>
</div>

<div class="col-xs-12">
    <?= $this->Form->create($problem,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add/Edit Problem') ?></legend>
            <div class="row">
                <div class="problem-image col-xs-12 col-sm-6 col-sm-push-6 text-center">
                    <div id="problem-image-dropzone" data-action="/ko-vicky/admin/mediafiles/upload/header/<?= $problem->id ?>">
                    <?php if (!empty($problem->mediafiles)): ?>
                        <?php foreach ($problem->mediafiles as $mediafile): ?>
                            <?php if($mediafile->media_type == 'header') : ?>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#croppingModal">
                                <div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  
                                    <div class="dz-image">
                                        <img data-dz-thumbnail="" alt="<?= $mediafile->file_name ?>" src="<?= $mediafile->file_url ?>" style="width: 100%; height: 100%">
                                    </div>  
                                    <div class="dz-details">     
                                        <div class="dz-filename">
                                            <span data-dz-name="">
                                                <?= $this->Html->link($mediafile->file_name, $mediafile->file_url,['target' => 'blank']) ?>
                                            </span>
                                        </div>  
                                    </div>  
                                </div>
                                </button>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                        <div class="dz-default dz-message">
                            <span>
                                <?= __('Drop files here to upload') ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $this->Form->input('title'); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?= $this->Form->input('user_id', ['options' => $users, 'empty' => false]); ?>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?= $this->Form->input('related_problems._ids', ['options' => $problems, 'empty' => true, 'multiple' => true, 'class' => 'select2']); ?>
                        </div>
                         <div class="col-xs-12">
                            <?= $this->Form->input('is_main_problem') ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->Form->input('description',['class' => 'wysiwyg']); ?>
            <div id="problem-dropzone" class="" data-action="/ko-vicky/admin/mediafiles/upload/attachment/<?= $problem->id ?>">
                <?php if (!empty($problem->mediafiles)): ?>
                    <?php foreach ($problem->mediafiles as $mediafile): ?>
                        <?php if($mediafile->media_type == 'attachment') : ?>
                            <div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  
                                <div class="dz-image">
                                    <img data-dz-thumbnail="" alt="<?= $mediafile->file_name ?>" src="<?= $mediafile->file_url ?>" style="width: 100%; height: 100%">
                                </div>  
                                <div class="dz-details">     
                                    <div class="dz-filename">
                                        <span data-dz-name="">
                                            <?= $this->Html->link($mediafile->file_name, $mediafile->file_url,['target' => 'blank']) ?>
                                        </span>
                                    </div>  
                                </div>  
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
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
