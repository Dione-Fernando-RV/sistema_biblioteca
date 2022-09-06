<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Component;
use App\Controller\AppController;

/**
 * CursosAlunos Controller
 *
 * @property \App\Model\Table\CursosAlunosTable $CursosAlunos
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CertificadosController extends AppController
{
    public function certificados($cursosAluno_id, $curso_id, $aluno_id, $tipo_participacao)
    {
        $this->loadModel('Cursos');
        $cursos = $this->Cursos->get($curso_id);

        switch ($tipo_participacao) {
                //participacao como aluno
            case 20:
                //curso           
                if ($cursos->tipo_curso_id == 1) {

                    return $this->redirect(['action' => 'cursoCertificadoParticipacao', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Grupo de Estudos
                elseif ($cursos->tipo_curso_id == 2) {
                    return $this->redirect(['action' => 'grupoEstudoCertificadoParticipacao', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Pós-Graduação
                elseif ($cursos->tipo_curso_id == 3) {
                    return $this->redirect(['action' => 'posCertificadoParticipacao', $cursosAluno_id, $curso_id, $aluno_id]);
                }
                break;
                //participacao como apoio
            case 30:
                //curso
                if ($cursos->tipo_curso_id == 1) {
                    return $this->redirect(['action' => 'cursoCertificadoApoio', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Grupo de Estudos
                elseif ($cursos->tipo_curso_id == 2) {
                    return $this->redirect(['action' => 'grupoEstudoCertificadoApoio', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Pós-Graduação
                elseif ($cursos->tipo_curso_id == 3) {
                    return $this->redirect(['action' => 'posCertificadoApoio', $cursosAluno_id, $curso_id, $aluno_id]);
                }
                break;
                //participacao como ministrante
            case 40:
                //curso
                if ($cursos->tipo_curso_id == 1) {
                    return $this->redirect(['action' => 'cursoCertificadoMinistrante', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Grupo de Estudos
                elseif ($cursos->tipo_curso_id == 2) {
                    return $this->redirect(['action' => 'grupoEstudoCertificadoMinistrante', $cursosAluno_id, $curso_id, $aluno_id]);
                } //Pós-Graduação
                elseif ($cursos->tipo_curso_id == 3) {
                    return $this->redirect(['action' => 'posCertificadoMinistrante', $cursosAluno_id, $curso_id, $aluno_id]);
                }
                break;
        }
    }

    public function cursoCertificadoParticipacao($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }

    public function cursoCertificadoApoio($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');


        $this->set(compact('grades', 'cursos', 'alunos'));
    }

    public function cursoCertificadoMinistrante($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }

    public function posCertificadoParticipacao($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }
    public function posCertificadoApoio($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }
    public function posCertificadoMinistrante($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }

    public function grupoEstudoCertificadoParticipacao($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }

    public function grupoEstudoCertificadoApoio($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }
    public function grupoEstudoCertificadoMinistrante($cursosAluno_id, $curso_id, $aluno_id)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('Cursos');
        $this->loadModel('Alunos');

        $cursos = $this->Cursos->get($curso_id);
        $alunos = $this->Alunos->get($aluno_id);

        $grades = $this->CursoDisciplinasInstrutores->find('all')
            ->contain(['CursoDisciplinas' => ['Cursos'], 'Instrutores'])
            ->where(['CursoDisciplinas.curso_id' => $curso_id])->limit('6');

        $this->set(compact('grades', 'cursos', 'alunos'));
    }
}
