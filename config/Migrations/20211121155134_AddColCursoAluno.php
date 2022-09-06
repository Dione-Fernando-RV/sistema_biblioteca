<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddColCursoAluno extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('cursos_alunos');
        $table->addColumn('liberar_curso', 'integer', [
            'default' => 1,
            'limit' => 11,
            'null' => true
        ])->update();
    }
}