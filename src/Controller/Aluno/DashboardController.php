<?php

declare(strict_types=1);

namespace App\Controller\Aluno;

use App\Controller\AppController;

class DashboardController extends AppController
{
   public function index()
   { 
      $alunoLogado = $this->Auth->user('aluno_id');
      $cursosAlunos = null;

      if (empty($alunoLogado)) {
        $this->Flash->set('Finalize seu Cadastro para poder continuar usando a plataforma! ');

        return $this->redirect(['controller' => 'alunos', 'prefix' => 'Aluno', 'action' => 'edit', 9]);
     }
 
      $this->loadModel('Alunos');
      $aluno = $this->Alunos->get($alunoLogado);

      $this->paginate = [
          'contain' => ['AgendaCursos' => ['CursosTurmas' => ['Cursos']], 'Alunos', 'Situacoes'],
       ];


       $this->loadModel('CursosAlunos');
       $query = $this->CursosAlunos->find('all')
          ->contain(['AgendaCursos', 'Alunos'])
          ->where(['CursosAlunos.situacao_id' => 1])
          ->andWhere(['CursosAlunos.aluno_id' =>  $alunoLogado]);


       $cursosAlunos = $this->paginate($query);

      $this->set(compact('cursosAlunos'));
   }

}