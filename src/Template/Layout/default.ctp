
<?= $this->Html->css(['KoVicky.bootstrap.min','KoVicky.bootstrap-material-design.min','KoVicky.ripples.min','KoVicky.select2.min','KoVicky.dropzone','KoVicky.global']) ?>
<?= $this->Html->script(['KoVicky.jquery-2.2.2.min', 'KoVicky.bootstrap.min','KoVicky.material.min','KoVicky.ripples.min', 'KoVicky.select2.min','KoVicky.dropzone', 'KoVicky.global', 'KoVicky.tinymce/tinymce.min.js']); ?>

<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<div class="container" >
    <div class="row">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <?= $this->fetch('content') ?>
    </div>
</div>

<footer>
    <?= $this->Html->scriptBlock('$.material.init()') ?>
</footer>

