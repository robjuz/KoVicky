<head>
<?= $this->Html->css([
    'KoVicky.bootstrap.min',
    'KoVicky.bootstrap-material-design.min',
    'KoVicky.ripples.min',
    'KoVicky.select2.min',
    'KoVicky.dropzone',
    'KoVicky.global'
]) ?>

<?= $this->Html->script([
    'KoVicky.jquery-2.2.2.min', 
    'KoVicky.select2.min', 
    'KoVicky.tinymce/tinymce.min.js',
    'KoVicky.bootstrap.min',
    'KoVicky.material.min',
    'KoVicky.dropzone', 
    'KoVicky.jquery-ui.min', 
    'KoVicky.ripples.min', 
    'KoVicky.global', 
]); ?>

<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>
<body>
	<div class="container">
        <?= $this->Flash->render() ?>
	</div>
	<div class="container">
	    <div class="row">
	        <?= $this->fetch('content') ?>
	    </div>
	</div>
	<footer>
	    <?= $this->Html->scriptBlock('$.material.init()') ?>
	</footer>
</body>