<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CursosTurmas Controller
 *
 * @property \App\Model\Table\CursosTurmasTable $CursosTurmas
 * @method \App\Model\Entity\CursosTurma[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosTurmasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situacoes', 'Cursos'],
        ];

        $query = $this->CursosTurmas->find()
            ->contain(['Cursos'])
            ->where(['CursosTurmas.situacao_id' => 1]);

        $cursosTurmas = $this->paginate($query);

        $this->set(compact('cursosTurmas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cursos Turma id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cursosTurma = $this->CursosTurmas->get($id, [
            'contain' => ['Situacoes'],
        ]);

        $this->set(compact('cursosTurma'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cursosTurma = $this->CursosTurmas->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursosTurma = $this->CursosTurmas->patchEntity($cursosTurma, $this->request->getData());
            $cursosTurma->situacao_id = 1;
            if ($this->CursosTurmas->save($cursosTurma)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Cursos Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Cursos Turma'));
        }
        $situacoes = $this->CursosTurmas->Situacoes->find('list', ['limit' => 200]);
        $cursos = $this->CursosTurmas->Cursos->find('list', ['limit' => 200])->where(['Cursos.situacao_id' => 1]);
        $this->set(compact('cursosTurma', 'situacoes', 'cursos'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Cursos Turma id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cursosTurma = $this->CursosTurmas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursosTurma = $this->CursosTurmas->patchEntity($cursosTurma, $this->request->getData());
            if ($this->CursosTurmas->save($cursosTurma)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Cursos Turma'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Cursos Turma'));
        }
        $situacoes = $this->CursosTurmas->Situacoes->find('list', ['limit' => 200]);
        $cursos = $this->CursosTurmas->Cursos->find('list', ['limit' => 200])->where(['Cursos.situacao_id' => 1]);

        $this->set(compact('cursosTurma', 'situacoes', 'cursos'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Cursos Turma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursosTurma = $this->CursosTurmas->get($id);
        $cursosTurma->situacao_id = 2;
        if ($this->CursosTurmas->save($cursosTurma)) {
            $this->Flash->success(__('O {0} foi deletado', 'Cursos Turma'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser deletar. Por favor, tente novamente.', 'Cursos Turma'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function encerrar($id = null)
    {
        $this->loadModel('CursoDisciplinasInstrutores');
        $this->loadModel('AgendaCursos');

        $cursosTurma = $this->CursosTurmas->get($id);
        $cursosTurma->situacao_id = 3;

        $updateDisciplinaInst = $this->CursoDisciplinasInstrutores->query()
            ->update()
            ->set(['situacao_id' => 3])
            ->where(['curso_turma_id' => $id])
            ->execute();
           
            $updateAgenda = $this->AgendaCursos->query()
            ->update()
           ->set(['situacao_id' => 3])
           ->where(['turma_id' => $id])
           ->execute();

        if ($this->CursosTurmas->save($cursosTurma) && $updateDisciplinaInst && $updateAgenda) {
            $this->Flash->success(__('O {0} foi Encerrada', 'Cursos Turma'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser Encerrado. Por favor, tente novamente.', 'Cursos Turma'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
