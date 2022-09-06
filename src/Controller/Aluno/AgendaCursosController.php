<?php

declare(strict_types=1);

namespace App\Controller\Aluno;

use App\Controller\AppController;

class AgendaCursosController extends AppController
{
    public function agenda()
    {
        $this->loadModel('AgendaCursos');
        $agendaCursos = $this->AgendaCursos->find()
            ->contain(['CursosTurmas' => ['Cursos']])
            ->where(['AgendaCursos.situacao_id' => 1])->all();

        $this->set(compact('agendaCursos'));
    }

    public function conteudoCurso($agenda_id = null, $curso_id = null)
    {
        $this->loadModel('Cursos');
        $this->loadModel('CursoDisciplinasInstrutores');

        $cursos = $this->Cursos->get($curso_id);

        $agendaCursos = $this->AgendaCursos->get($agenda_id, [
            'contain' => ['CursosTurmas']
        ]);

        $disciplinas = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['Instrutores', 'CursoDisciplinas'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id]);

        $this->set(compact('agendaCursos', 'cursos', 'disciplinas'));
    }
}
