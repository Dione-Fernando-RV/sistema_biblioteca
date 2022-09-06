<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CursoDisciplinas Controller
 *
 * @property \App\Model\Table\CursoDisciplinasTable $CursoDisciplinas
 * @method \App\Model\Entity\CursoDisciplina[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursoDisciplinasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cursos'],
        ];

        $query = $this->CursoDisciplinas->find('all')
        ->contain(['Usuarios','UsuariosEdit', 'Cursos'])
        ->where(['CursoDisciplinas.situacao_id' => 1]);

        $cursoDisciplinas = $this->paginate($query);

        $this->set(compact('cursoDisciplinas'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso Disciplina id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cursoDisciplina = $this->CursoDisciplinas->get($id, [
            'contain' => ['Cursos', 'Situacoes'],
        ]);

        $this->set(compact('cursoDisciplina'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cursoDisciplina = $this->CursoDisciplinas->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursoDisciplina = $this->CursoDisciplinas->patchEntity($cursoDisciplina, $this->request->getData());
            $cursoDisciplina->situacao_id = 1;
            if ($this->CursoDisciplinas->save($cursoDisciplina)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Curso Disciplina'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Curso Disciplina'));
        }
        $cursos = $this->CursoDisciplinas->Cursos->find('list', ['limit' => 200]);
        $situacoes = $this->CursoDisciplinas->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('cursoDisciplina', 'cursos', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Curso Disciplina id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cursoDisciplina = $this->CursoDisciplinas->get($id, [
            'contain' => ['Instrutores']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursoDisciplina = $this->CursoDisciplinas->patchEntity($cursoDisciplina, $this->request->getData());
            if ($this->CursoDisciplinas->save($cursoDisciplina)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Curso Disciplina'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Curso Disciplina'));
        }
        $cursos = $this->CursoDisciplinas->Cursos->find('list', ['limit' => 200]);
        $situacoes = $this->CursoDisciplinas->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('cursoDisciplina', 'cursos', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Curso Disciplina id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursoDisciplina = $this->CursoDisciplinas->get($id);
        $cursoDisciplina->situacao_id = 2;
        if ($this->CursoDisciplinas->save($cursoDisciplina)) {
            $this->Flash->success(__('O {0} foi deletado', 'Curso Disciplina'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser deletado. Por favor, tente novamente.', 'Curso Disciplina'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function buscaDisciplina($cursoId) {
        $res = $this->CursoDisciplinas->find()->where(['CursoDisciplinas.curso_id' => $cursoId])->toArray();

        echo json_encode($res);

        exit;
    }
}
