<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Instrutores Controller
 *
 * @property \App\Model\Table\InstrutoresTable $Instrutores
 * @method \App\Model\Entity\Instrutore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstrutoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Escolaridades', 'Situacoes'],
        ];
        $query = $this->Instrutores->find()
        ->contain(['Escolaridades'])
        ->where(['Instrutores.situacao_id' => 1]);

        $instrutores = $this->paginate($query);
        $this->set(compact('instrutores'));
    }

    /**
     * View method
     *
     * @param string|null $id Instrutore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instrutore = $this->Instrutores->get($id, [
            'contain' => ['Escolaridades', 'Situacoes', 'CursoDisciplinas'],
        ]);

        $this->set(compact('instrutore'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $instrutore = $this->Instrutores->newEmptyEntity();
        if ($this->request->is('post')) {
            $instrutore = $this->Instrutores->patchEntity($instrutore, $this->request->getData());
            $instrutore->situacao_id = 1;
            if ($this->Instrutores->save($instrutore)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Instrutore'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Instrutore'));
        }
        $escolaridades = $this->Instrutores->Escolaridades->find('list', ['limit' => 200]);
        $situacoes = $this->Instrutores->Situacoes->find('list', ['limit' => 200]);
        $cursoDisciplinas = $this->Instrutores->CursoDisciplinas->find('list', ['limit' => 200]);
        $this->set(compact('instrutore', 'escolaridades', 'situacoes', 'cursoDisciplinas'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Instrutore id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $instrutore = $this->Instrutores->get($id, [
            'contain' => ['CursoDisciplinas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $instrutore = $this->Instrutores->patchEntity($instrutore, $this->request->getData());
            if ($this->Instrutores->save($instrutore)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Instrutore'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Instrutore'));
        }
        $escolaridades = $this->Instrutores->Escolaridades->find('list', ['limit' => 200]);
        $situacoes = $this->Instrutores->Situacoes->find('list', ['limit' => 200]);
        $cursoDisciplinas = $this->Instrutores->CursoDisciplinas->find('list', ['limit' => 200]);
        $this->set(compact('instrutore', 'escolaridades', 'situacoes', 'cursoDisciplinas'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Instrutore id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instrutore = $this->Instrutores->get($id);
        $instrutore->situacao_id = 2;
        if ($this->Instrutores->save($instrutore)) {
            $this->Flash->success(__('O {0} foi deletado.', 'Instrutore'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser deletado. Por favor, tente novamente.', 'Instrutore'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
