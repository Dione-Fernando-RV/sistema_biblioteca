<?php

declare(strict_types=1);

namespace App\Controller\Aluno;

use App\Controller\AppController;

class MatriculaController extends AppController
{
   public function matricula($agenda_id = null, $curso_id = null)
   {
      $this->loadModel('AgendaCursos');
      $this->loadModel('Cursos');
      $this->loadModel('CursoDisciplinasInstrutores');


      $cursos = $this->Cursos->get($curso_id);

      $agendaCursos = $this->AgendaCursos->get($agenda_id, [
         'contain' => ['CursosTurmas']
      ]);

      $disciplinas = $this->CursoDisciplinasInstrutores->find('all') //CursoDisciplinas  CursoDisciplinasInstrutores
         ->contain(['Instrutores','CursoDisciplinas'])
         ->where(['CursoDisciplinas.curso_id' => $curso_id]);

      $this->set(compact('agendaCursos', 'cursos', 'disciplinas', 'agenda_id', 'curso_id'));
   }

   public function confirmar($agenda_id = null, $curso_id = null, $matriculaConfirmada = null)
   {
      $this->loadModel('CursosAlunos');
      $alunoLogado = $_SESSION['Auth']['Aluno']['aluno_id'];
      
      //    MATRICULA CONFIRMAÇÃO
      if (!empty($agenda_id)) {
         $cursosAluno = $this->CursosAlunos->newEmptyEntity();
         $cursosAluno->agenda_id = $agenda_id;
         $cursosAluno->situacao_id = 1;
         $cursosAluno->aluno_id =  $alunoLogado;

            if ($this->CursosAlunos->save($cursosAluno)) {
               $this->Flash->success(__('Sua matricula foi realizada com sucesso.', 'Cursos Aluno'));

               return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Cursos Aluno'));
         
      }
   }
}
