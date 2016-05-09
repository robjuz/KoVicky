<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('«') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('»') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>