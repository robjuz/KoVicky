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