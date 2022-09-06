<?php

declare(strict_types=1);

namespace App\Controller;

class IndexController extends AppController
{
    public function index()
    {
    }

    public function cursos()
    {
    }
    public function artigos()
    {
    }
    public function agenda()
    {
        $this->loadModel('AgendaCursos');
        $agendaCursos = $this->AgendaCursos->find()
            ->contain(['CursosTurmas' => ['Cursos']])
            ->where(['AgendaCursos.situacao_id' => 1])->all();


        $this->set(compact('agendaCursos'));
    }

    public function conteudoCurso()
    {
        $this->loadModel('AgendaCursos');       

        $disciplinas = $this->AgendaCursos->find('all')
        ->contain(['CursosTurmas'=> ['Cursos' => ['CursoDisciplinas']]])
        ->where(['Cursos.id' => 1]);
        
        $this->set(compact('disciplinas'));
    }
}
