<div class="mediafiles form large-9 medium-8 columns content">
    <?= $this->Form->create($mediafile) ?>
    <fieldset>
        <legend><?= __('Edit Mediafile') ?></legend>
        <?php
            echo $this->Form->input('solution_id', ['options' => $solutions]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
