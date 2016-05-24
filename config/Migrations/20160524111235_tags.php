<?php

use Phinx\Migration\AbstractMigration;

class Tags extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
     public function up()
     {
         $table = $this->table('KoVicky_tags');
         $table
             ->addColumn('title', 'string', [
                 'default' => null,
                 'limit' => 255,
                 'null' => true,
             ])
             ->addColumn('created', 'timestamp', [
                 'default' => null,
                 'limit' => null,
                 'null' => true,
             ])
             ->addColumn('modified', 'timestamp', [
                 'default' => null,
                 'limit' => null,
                 'null' => true,
             ])
             ->create();

             $table = $this->table('KoVicky_problems_tags');
             $table = $this->table('KoVicky_problems_tags', ['id' => false, 'primary_key' => ['problem_id', 'tag_id']]);
             $table
                 ->addColumn('problem_id', 'integer', [
                     'default' => null,
                     'limit' => 11,
                     'null' => false,
                 ])
                 ->addColumn('tag_id', 'integer', [
                     'default' => null,
                     'limit' => 11,
                     'null' => false,
                 ])
                 ->create();
     }
}
