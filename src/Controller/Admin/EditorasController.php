<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Editoras Controller
 *
 * @property \App\Model\Table\EditorasTable $Editoras
 * @method \App\Model\Entity\Editora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EditorasController extends AppController
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
        $editoras = $this->paginate($this->Editoras);

        $this->set(compact('editoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Editora id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $editora = $this->Editoras->get($id, [
            'contain' => ['Situacoes', 'Livros'],
        ]);

        $this->set(compact('editora'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $editora = $this->Editoras->newEmptyEntity();
        if ($this->request->is('post')) {
            $editora = $this->Editoras->patchEntity($editora, $this->request->getData());
            if ($this->Editoras->save($editora)) {
                $this->Flash->success(__('The {0} has been saved.', 'Editora'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Editora'));
        }
        $situacoes = $this->Editoras->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('editora', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Editora id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $editora = $this->Editoras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $editora = $this->Editoras->patchEntity($editora, $this->request->getData());
            if ($this->Editoras->save($editora)) {
                $this->Flash->success(__('The {0} has been saved.', 'Editora'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Editora'));
        }
        $situacoes = $this->Editoras->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('editora', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Editora id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $editora = $this->Editoras->get($id);
        if ($this->Editoras->delete($editora)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Editora'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Editora'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
