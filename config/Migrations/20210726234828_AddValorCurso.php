<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddValorCurso extends AbstractMigration
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
        $table = $this->table('cursos');
        $table->addColumn('valor', 'decimal', [
            'default' => 0.00,
            'null' => true,
            'precision' => 11,
            'scale' => 2
        ]);
        $table->update();
        
        $table = $this->table('agenda_cursos');
        $table->addColumn('valor_curso', 'decimal', [
            'default' => 0.00,
            'null' => true,
            'precision' => 11,
            'scale' => 2
        ]);
        $table->update();
    }
    
}
