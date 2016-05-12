<div class="col-sm-12">
    <div class="jumbotron text-center">
        <h1>Tutorials to make all written by all</h1>
        <h3>Free and open-source textbooks that anyone can improve.</h3>
    </div>
</div>

<div class="problems-list">
    <?php foreach ($problems as $problem) : ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="img-responsive" src="<?= $problem->photo ?>" alt="IMAGE">
            <div class="caption">
                <h3><?= $problem->title ?></h3>
                <p> <?= $this->Text->truncate(
                        $problem->description,
                        128,
                        [
                            'ellipsis' => '...',
                            'exact' => false
                        ]
                    ); ?>
                </p>
                <p class="">
                    <?= $this->Html->link(__('Read more'),['action' => 'view', $problem->id], ['class' => 'btn btn-primary']); ?>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail new-problem">
                <?= $this->Html->link($this->Html->icon('plus'),[
                        'action' => 'edit'
                    ],[
                        'escape' => false,
                        'style' => 'color: black;'
                    ]) 
                ?>
        </div>
    </div>
</div>