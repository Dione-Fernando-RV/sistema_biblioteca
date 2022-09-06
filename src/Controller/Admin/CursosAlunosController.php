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
class CursosAlunosController extends AppController
{
    // public $components = ['CursosAlunos'];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AgendaCursos' => ['CursosTurmas' => ['Cursos']], 'Alunos', 'Situacoes'],
        ];

        $query = $this->CursosAlunos->find('all')
            ->contain(['AgendaCursos', 'Alunos'])
            ->where(['CursosAlunos.situacao_id' => 1]);
        $cursosAlunos = $this->paginate($query);

        $this->set(compact('cursosAlunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cursosAluno = $this->CursosAlunos->get($id, [
            'contain' => ['AgendaCursos', 'Alunos', 'Situacoes'],
        ]);

        $this->set(compact('cursosAluno'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('AgendaCursos');
        $cursosAluno = $this->CursosAlunos->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursosAluno = $this->CursosAlunos->patchEntity($cursosAluno, $this->request->getData());
            if ($this->CursosAlunos->save($cursosAluno)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Cursos Aluno'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Cursos Aluno'));
        }

        $agendaCursos = $this->CursosAlunos->AgendaCursos->find('list', ['limit' => 200]);
        $alunos = $this->CursosAlunos->Alunos->find('list', ['limit' => 200]);
        $situacoes = $this->CursosAlunos->Situacoes->find('list', ['limit' => 200]);
        $this->loadComponent('CursosAlunos');
        $voluntario =  $this->CursosAlunos->getVoluntario();
        $ministrante =  $this->CursosAlunos->getMinistrate();

        $getTurmaCurso = $this->AgendaCursos->getMatricula();

        $this->set(compact('voluntario', 'ministrante', 'cursosAluno', 'getTurmaCurso', 'alunos', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cursosAluno = $this->CursosAlunos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursosAluno = $this->CursosAlunos->patchEntity($cursosAluno, $this->request->getData());
            if ($this->CursosAlunos->save($cursosAluno)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Cursos Aluno'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Cursos Aluno'));
        }
        $agendaCursos = $this->CursosAlunos->AgendaCursos->find('list', ['limit' => 200]);
        $alunos = $this->CursosAlunos->Alunos->find('list', ['limit' => 200]);
        $situacoes = $this->CursosAlunos->Situacoes->find('list', ['limit' => 200]);
        $this->loadComponent('CursosAlunos');
        $voluntario =  $this->CursosAlunos->getVoluntario();
        $ministrante =  $this->CursosAlunos->getMinistrate();
        $this->set(compact('voluntario', 'ministrante', 'cursosAluno', 'agendaCursos', 'alunos', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Cursos Aluno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursosAluno = $this->CursosAlunos->get($id);
        $cursosAluno->situacao_id = 2;

        if ($this->CursosAlunos->save($cursosAluno)) {
            $this->Flash->success(__('O {0} foi excluído.', 'Cursos Aluno'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser excluído. Por favor, tente novamente.', 'Cursos Aluno'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function bloquearCurso($id = null)
    {
     //   $this->request->allowMethod(['post']);
        $cursosAluno = $this->CursosAlunos->get($id);
        $cursosAluno->liberar_curso = 0;

        if ($this->CursosAlunos->save($cursosAluno)) {
            $this->Flash->success(__('O {0} foi bloqueado.', ' no Cursos'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser bloqueado. Por favor, tente novamente.', 'Cursos'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function liberarCurso($id = null)
    {
     //   $this->request->allowMethod(['post']);
        $cursosAluno = $this->CursosAlunos->get($id);
        $cursosAluno->liberar_curso = 1;

        if ($this->CursosAlunos->save($cursosAluno)) {
            $this->Flash->success(__('O {0} foi bloqueado.', ' no Cursos'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser bloqueado. Por favor, tente novamente.', 'Cursos'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function certificados()
    {


        return $this->redirect(['action' => 'certificados']);
    }
}
