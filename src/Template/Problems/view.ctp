<div class="col-xs-12">
    <div class="well">
        <h3>
            <?= h($problem->title) ?>
            <small>
                <?= $problem->has('category') ? $this->Html->link($problem->category->title, ['controller' => 'Categories', 'action' => 'view', $problem->category->id]) : '' ?>
            </small>
        </h3>
        <p class="lead">
            <?= __('by {0}', $problem->user->username) ?>
        </p>
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
        <?= $this->Text->autoParagraph(h($problem->thesis)); ?>
        <hr>
        <?= $this->Text->autoParagraph(h($problem->description)); ?>

    </div>

    <div id="solutions">
        <div class="well">
            <h4><?= __('Related Solutions') ?></h4>

        <?php if (!empty($problem->solutions)): ?>
            <?php foreach ($problem->solutions as $solution): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <p>
                           <?= __('Solution by: {0}', $solution->user->username) ?>
                       </p>
                        <p>
                        <p><span class="glyphicon glyphicon-time"></span> <?= __('Created on {0}',h($solution->created)) ?></p>
                        </p>
                        <?php
                        if ($solution->created != $solution->modified) :
                            ?>
                            <p><span class="glyphicon glyphicon-time"></span> <?= __('Last update on {0}',h($problem->modified)) ?></p>
                        <?php endif ?>
                    </div>
                    <div class="panel-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?= __('Steps') ?></a></li>
                                <li role="presentation"><a href="#mediafiles" aria-controls="mediafiles" role="tab" data-toggle="tab"><?= __('Files') ?></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="description">
                                    <?= $solution->description ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="mediafiles">
                                    FILES
                                </div>
                            </div>

                        </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>



</div>