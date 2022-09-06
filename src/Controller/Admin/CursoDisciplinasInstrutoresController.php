<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CursoDisciplinasInstrutores Controller
 *
 * @property \App\Model\Table\CursoDisciplinasInstrutoresTable $CursoDisciplinasInstrutores
 * @method \App\Model\Entity\CursoDisciplinasInstrutore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursoDisciplinasInstrutoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CursoDisciplinas', 'Instrutores', 'CursosTurmas', 'Situacoes','Usuarios', 'UsuariosEdit'],
        ];

        $query = $this->CursoDisciplinasInstrutores->find('all')
        ->contain(['CursoDisciplinas','Instrutores','CursosTurmas'])
        ->where(['CursoDisciplinasInstrutores.situacao_id' => 1]);

        $cursoDisciplinasInstrutores = $this->paginate($query);

        $this->set(compact('cursoDisciplinasInstrutores'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso Disciplinas Instrutore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->get($id, [
            'contain' => ['CursoDisciplinas', 'Instrutores', 'CursosTurmas', 'Situacoes'],
        ]);

        $this->set(compact('cursoDisciplinasInstrutore'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->newEmptyEntity();
        if ($this->request->is('post')) {
            $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->patchEntity($cursoDisciplinasInstrutore, $this->request->getData());
            $cursoDisciplinasInstrutore->situacao_id = 1;
            if ($this->CursoDisciplinasInstrutores->save($cursoDisciplinasInstrutore)) {
                $this->Flash->success(__('The {0} has been saved.', 'Curso Disciplinas Instrutore'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Curso Disciplinas Instrutore'));
        }
        $cursoDisciplinas = $this->CursoDisciplinasInstrutores->CursoDisciplinas->find('list', ['limit' => 200]);
        $instrutores = $this->CursoDisciplinasInstrutores->Instrutores->find('list', ['limit' => 200]);
        $cursosTurmas = $this->CursoDisciplinasInstrutores->CursosTurmas->find('list', ['limit' => 200]);
        $situacoes = $this->CursoDisciplinasInstrutores->Situacoes->find('list', ['limit' => 200]);
        $cursos = $this->CursoDisciplinasInstrutores->CursoDisciplinas->Cursos->find('list', ['limit' => 200]);

        $this->set(compact('cursoDisciplinasInstrutore', 'cursoDisciplinas', 'instrutores', 'cursosTurmas', 'cursos', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Curso Disciplinas Instrutore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->patchEntity($cursoDisciplinasInstrutore, $this->request->getData());
            if ($this->CursoDisciplinasInstrutores->save($cursoDisciplinasInstrutore)) {
                $this->Flash->success(__('The {0} has been saved.', 'Curso Disciplinas Instrutore'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Curso Disciplinas Instrutore'));
        }
        $cursoDisciplinas = $this->CursoDisciplinasInstrutores->CursoDisciplinas->find('list', ['limit' => 200]);
        $instrutores = $this->CursoDisciplinasInstrutores->Instrutores->find('list', ['limit' => 200]);
        $cursosTurmas = $this->CursoDisciplinasInstrutores->CursosTurmas->find('list', ['limit' => 200]);
        $situacoes = $this->CursoDisciplinasInstrutores->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('cursoDisciplinasInstrutore', 'cursoDisciplinas', 'instrutores', 'cursosTurmas', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Curso Disciplinas Instrutore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cursoDisciplinasInstrutore = $this->CursoDisciplinasInstrutores->get($id);
        if ($this->CursoDisciplinasInstrutores->delete($cursoDisciplinasInstrutore)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Curso Disciplinas Instrutore'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Curso Disciplinas Instrutore'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
