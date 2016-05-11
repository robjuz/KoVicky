<div class="col-xs-12">
    <div class="well">
        <div class="problem-image"><img class="img-responsive" src="<?= $problem->photo ?>"></div>
        <h3>
            <?= h($problem->title) ?>
            <small>
                <!-- <?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Problems', 'action' => 'index', $problem->category->id]) : '' ?> -->
            </small>
        </h3>
        <p>
            <span class="glyphicon glyphicon-time"></span>
            <?= __('Created on {0}',h($problem->created)) ?>
        </p>
        <?php if ($problem->created != $problem->modified) :?>
        <p>
            <span class="glyphicon glyphicon-time"></span>
            <?= __('Last update on {0}',h($problem->modified)) ?>
        </p>
        <?php endif ?>

        <hr>
        <h4> <?= __('Description:') ?> </h4>
        <?= $problem->description ?>

    </div>

    <?php 
    if (!empty($problem->mediafiles)): ?>
    <div id="related-mediafiles" class="well">
        <div class="dropzone dz-clickable dz-started">
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
        </div>
    </div>
    <?php
    endif;
    ?>                             

    <?php 
    if (!empty($problem->child_problems)): ?>
    <div id="related-problems" class="well">
        <h3> <?= __('Related Problems:') ?> </h3>
        <div class="row">
        <?php foreach ($problem->child_problems as $child_problem) : ?>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail problem-image">
                    <img src="<?= $child_problem->photo ?>" alt="IMAGE">
                    <div class="caption">
                        <h3><?= $child_problem->title ?></h3>
                        <p> <?= $this->Text->truncate(
                                $child_problem->description,
                                128,
                                [
                                    'ellipsis' => '...',
                                    'exact' => false
                                ]
                            ); ?>
                        </p>
                        <p class="">
                            <?= $this->Html->link(__('Read more'),['action' => 'view', $child_problem->id], ['class' => 'btn btn-primary']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    endif;
    ?>
</div>