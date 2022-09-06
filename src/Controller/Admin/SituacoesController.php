<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Situacoes Controller
 *
 * @property \App\Model\Table\SituacoesTable $Situacoes
 * @method \App\Model\Entity\Situaco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SituacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $situacoes = $this->paginate($this->Situacoes);

        $this->set(compact('situacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Situaco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $situaco = $this->Situacoes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('situaco'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $situaco = $this->Situacoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $situaco = $this->Situacoes->patchEntity($situaco, $this->request->getData());
            if ($this->Situacoes->save($situaco)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situaco'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situaco'));
        }
        $this->set(compact('situaco'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Situaco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $situaco = $this->Situacoes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $situaco = $this->Situacoes->patchEntity($situaco, $this->request->getData());
            if ($this->Situacoes->save($situaco)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situaco'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situaco'));
        }
        $this->set(compact('situaco'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Situaco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $situaco = $this->Situacoes->get($id);
        if ($this->Situacoes->delete($situaco)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Situaco'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Situaco'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
