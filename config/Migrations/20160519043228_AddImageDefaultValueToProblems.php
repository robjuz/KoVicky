<?php
use Migrations\AbstractMigration;

class AddImageDefaultValueToProblems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('KoVicky_problems');
        $table->removeColumn('image');
        $table->addColumn('image', 'string', [
            'default' => '../ko_vicky/img/default_thumb.jpg',
            'limit' => 255,
            'null' => false,
        ]);
        $table->removeColumn('thumb');
        $table->addColumn('thumb', 'string', [
            'default' => '../ko_vicky/img/default_thumb.jpg',
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
