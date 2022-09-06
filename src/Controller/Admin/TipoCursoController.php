<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TipoCurso Controller
 *
 * @property \App\Model\Table\TipoCursoTable $TipoCurso
 * @method \App\Model\Entity\TipoCurso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoCursoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situacoes'],
        ];
        $tipoCurso = $this->paginate($this->TipoCurso);

        $this->set(compact('tipoCurso'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoCurso = $this->TipoCurso->get($id, [
            'contain' => ['Situacoes'],
        ]);

        $this->set(compact('tipoCurso'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoCurso = $this->TipoCurso->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoCurso = $this->TipoCurso->patchEntity($tipoCurso, $this->request->getData());
            $tipoCurso->situacao_id = 1;
            if ($this->TipoCurso->save($tipoCurso)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tipo Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tipo Curso'));
        }
        $situacoes = $this->TipoCurso->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('tipoCurso', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Tipo Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoCurso = $this->TipoCurso->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoCurso = $this->TipoCurso->patchEntity($tipoCurso, $this->request->getData());
            if ($this->TipoCurso->save($tipoCurso)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tipo Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tipo Curso'));
        }
        $situacoes = $this->TipoCurso->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('tipoCurso', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Tipo Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoCurso = $this->TipoCurso->get($id);
        if ($this->TipoCurso->delete($tipoCurso)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Tipo Curso'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Tipo Curso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
