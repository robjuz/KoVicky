<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('KoVicky_mediafiles');
        $table
            ->addColumn('problem_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('file_url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('KoVicky_problems');
        $table
            ->addColumn('user_id', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_active', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('is_main_problem', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('KoVicky_problems_problems', ['id' => false, 'primary_key' => ['problem_id', 'related_problem_id']]);
        $table
            ->addColumn('problem_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('related_problem_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

    }

    public function down()
    {
        $this->dropTable('KoVicky_mediafiles');
        $this->dropTable('KoVicky_problems');
        $this->dropTable('KoVicky_problems_problems');
    }
}
