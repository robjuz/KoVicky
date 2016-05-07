
<?= $this->Html->css([
    'KoVicky.cake',
    'KoVicky.base',
    'KoVicky.select2.min',
    'KoVicky.dropzone',
    'KoVicky.global'
]) ?>

<?= $this->Html->script([
    'KoVicky.jquery-2.2.2.min', 
    'KoVicky.select2.min',
    'KoVicky.dropzone', 
    'KoVicky.global', 
    'KoVicky.tinymce/tinymce.min.js']); ?>

<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
    </ul>
</nav>

<?= $this->Flash->render() ?>

<div class="container clearfix">
    
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('Problems List'), ['controller' => 'Problems', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Problem'), ['controller' => 'Problems','action' => 'edit']) ?> </li>
            <li><?= $this->Html->link(__('Solutions List'), ['controller' => 'Solutions', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Solution'), ['controller' => 'Solutions', 'action' => 'edit']) ?> </li>
            <li><?= $this->Html->link(__('Categories List'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'edit']) ?> </li>
            <li><?= $this->Html->link(__('Mediafiles List'), ['controller' => 'Mediafiles', 'action' => 'index']) ?> </li>
        </ul>
    </nav>

    <?= $this->fetch('content') ?>

</div>
<footer>
</footer>
