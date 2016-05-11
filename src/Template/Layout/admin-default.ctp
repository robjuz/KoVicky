<head>
<?= $this->Html->css([
    'KoVicky.bootstrap.min',
    'KoVicky.bootstrap-material-design.min',
    'KoVicky.ripples.min',
    'KoVicky.dropzone',
    'KoVicky.global'
]) ?>

<?= $this->Html->script([
    'KoVicky.jquery-2.2.2.min', 
    'KoVicky.tinymce/tinymce.min.js',
    'KoVicky.bootstrap.min',
    'KoVicky.material.min',
    'KoVicky.dropzone', 
    'KoVicky.jquery-ui.min', 
    'KoVicky.ripples.min', 
    'KoVicky.picturecut/src/jquery.picture.cut',
    'KoVicky.global', 
]); ?>


<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <?= $this->Flash->render() ?>
        </div>
    </div>
    <div class="container">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="javascript:void(0)">Brand</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?= __('Problems') ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Problems List'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems','action' => 'edit']) ?> </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?= __('Mediafiles') ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link(__('Mediafiles List'), ['controller' => 'Mediafiles', 'action' => 'index']) ?> </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">
        <?= $this->fetch('content') ?>
    </div>

</div>
<footer>
</footer>
</body>