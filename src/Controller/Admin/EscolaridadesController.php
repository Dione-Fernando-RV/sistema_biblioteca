<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Escolaridades Controller
 *
 * @property \App\Model\Table\EscolaridadesTable $Escolaridades
 * @method \App\Model\Entity\Escolaridade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EscolaridadesController extends AppController
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

        $query = $this->Escolaridades->find()
        ->contain(['Situacoes'])
        ->where(['Escolaridades.situacao_id' => 1]);

        $escolaridades = $this->paginate($query);

        $this->set(compact('escolaridades'));

    }

    /**
     * View method
     *
     * @param string|null $id Escolaridade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escolaridade = $this->Escolaridades->get($id, [
            'contain' => ['Situacoes', 'Alunos', 'Instrutores'],
        ]);

        $this->set(compact('escolaridade'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escolaridade = $this->Escolaridades->newEmptyEntity();
        if ($this->request->is('post')) {
            $escolaridade = $this->Escolaridades->patchEntity($escolaridade, $this->request->getData());
            $escolaridade->situacao_id = 1;
            if ($this->Escolaridades->save($escolaridade)) {
                $this->Flash->success(__('A {0} Foi salvo.', 'Escolaridade'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não pôde ser salvo. Por favor, tente novamente.', 'Escolaridade'));
        }
        $situacoes = $this->Escolaridades->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('escolaridade', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Escolaridade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escolaridade = $this->Escolaridades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escolaridade = $this->Escolaridades->patchEntity($escolaridade, $this->request->getData());
            if ($this->Escolaridades->save($escolaridade)) {
                $this->Flash->success(__('A {0} foi salvo.', 'Escolaridade'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não pôde ser salvo. Por favor, tente novamente.', 'Escolaridade'));
        }
        $situacoes = $this->Escolaridades->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('escolaridade', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Escolaridade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $this->request->allowMethod(['post', 'delete']);
        $escolaridade = $this->Escolaridades->get($id);
        $escolaridade->situacao_id = 2;
        if ($this->Escolaridades->save($escolaridade)) {
            $this->Flash->success(__('A {0} foi deletado.', 'Escolaridade'));
        } else {
            $this->Flash->error(__('A {0} não pôde ser excluído. Por favor, tente novamente.', 'Escolaridade'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
