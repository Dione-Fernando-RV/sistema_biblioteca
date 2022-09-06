<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddArquivoToCursos extends AbstractMigration
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
        $table->addColumn('anexo_nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])->addColumn('anexo_dir', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ])->update();
    }
}