<div class="col-xs-12">
    <div class="well">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-sm-push-8">
                <?php if (!empty($problem->image)): ?>
                    <img class="img-responsive"  src="<?= '/uploads/'.$problem->thumb ?>" alt="<?= h($problem->title) ?>" />
                <?php endif ?>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-pull-4">
                <h3>
                    <?= h($problem->title) ?>
                    <?php if($isAllowedToEdit) : ?>
                        <small>
                            <?= $this->Html->link(
                                $this->Html->icon('edit'),[
                                    'action' => 'edit', 
                                    $problem->id
                                ],[
                                    'escape' => false
                                ]
                            ); ?>
                        </small>
                    <?php endif; ?>
                </h3>
                <p>
                    <?= $this->Html->icon('user') ?>
                    <?= __('Created by {0}',h($problem->user->username)) ?>
                </p>
                <p>
                    <?= $this->Html->icon('time') ?>
                    <?= __('Created on {0}',h($problem->created)) ?>
                </p>
                <?php if ($problem->created != $problem->modified) :?>
                <p>
                    <?= $this->Html->icon('time') ?>
                    <?= __('Last update on {0}',h($problem->modified)) ?>
                </p>
                <?php endif ?>

                <hr>
                <h4> <?= __('Description:') ?> </h4>
                <p>
                    <?= $problem->description ?>
                </p>
            </div>
        </div>
    </div>

    <?php if (!empty($problem->mediafiles)): ?>
        <div id="related-mediafiles" class="well">
            <h3> <?= __('Mediafiles:') ?> </h3>
            <div class="dropzone dz-clickable dz-started">
                <?php foreach ($problem->mediafiles as $mediafile): ?>
                    <div class="dz-preview dz-processing dz-success dz-complete dz-image-preview">  
                        <div class="dz-image">
                            <img data-dz-thumbnail="" alt="<?= $mediafile->file_name ?>" src="<?= $mediafile->file_url ?>">
                        </div>  
                        <div class="dz-details">  
                            <div class="dz-filename">
                                <span data-dz-name="">
                                    <?= $this->Html->link(
                                        $mediafile->file_name, 
                                        $mediafile->file_url,[
                                            'target' => 'blank'
                                        ]
                                    ); ?>
                                </span>
                            </div>  
                        </div>  
                    </div>
            <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>                             

    <div id="related-problems" class="well problems-list">
        <h3> <?= __('Related Problems:') ?> </h3>
        <div class="row">
            <?php if (!empty($problem->related_problems) ): ?>
                <?php foreach ($problem->related_problems as $related_problem) : ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="<?= '/uploads/'.$related_problem->thumb ?>" alt="IMAGE">
                            <div class="caption">
                                <h3><?= $related_problem->title ?></h3>
                                <p> <?= $this->Text->truncate(
                                        $related_problem->description,
                                        128,[
                                            'ellipsis' => '...',
                                            'exact' => false
                                        ]
                                    ); ?>
                                </p>
                                <p>
                                    <?= $this->Html->link(
                                        __('Read more'),[
                                            'action' => 'view', 
                                            $related_problem->id
                                        ], [
                                            'class' => 'btn btn-primary'
                                        ]
                                    ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($problem->parent_problems) ): ?>
                <?php foreach ($problem->parent_problems as $parent_problem) : ?>
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="<?= '/uploads/'.$parent_problem->thumb ?>" alt="IMAGE">
                            <div class="caption">
                                <h3><?= $parent_problem->title ?></h3>
                                <p> <?= $this->Text->truncate(
                                        $parent_problem->description,
                                        128,[
                                            'ellipsis' => '...',
                                            'exact' => false
                                        ]
                                    ); ?>
                                </p>
                                <p>
                                    <?= $this->Html->link(
                                        __('Read more'),[
                                            'action' => 'view', 
                                            $parent_problem->id
                                        ], [
                                            'class' => 'btn btn-primary'
                                        ]
                                    ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
            <?php endif; ?>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail new-problem">
                        <?= $this->Html->link(
                            $this->Html->icon('plus'),[
                                'action' => 'edit'
                            ],[
                                'escape' => false,
                                'style' => 'color: black;'
                            ]
                        ); ?>
                </div>
            </div>
        </div>
    </div>
</div>