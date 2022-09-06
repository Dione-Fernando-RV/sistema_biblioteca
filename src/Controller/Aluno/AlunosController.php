<?php

declare(strict_types=1);

namespace App\Controller\Aluno;


use App\Controller\AppController;

/**
 * Alunos Controller
 *
 * @property \App\Model\Table\AlunosTable $Alunos
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlunosController extends AppController
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
        $query = $this->Alunos->find('all')
            ->contain(['Escolaridades'])
            ->where(['Alunos.situacao_id' => 1]);


        $alunos = $this->paginate($query);

        $this->set(compact('alunos'));
    }

    /**
     * View method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aluno = $this->Alunos->get($id, [
            'contain' => ['Escolaridades', 'Situacoes'],
        ]);

        $this->set(compact('aluno'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aluno = $this->Alunos->newEmptyEntity();
        if ($this->request->is('post')) {
            $aluno = $this->Alunos->patchEntity($aluno, $this->request->getData());
            $aluno->cadastro_completo = 1;
            //$aluno->data_nascimento = !empty($aluno->data_nascimento) ? implode('-', array_reverse(explode('/', $aluno->data_nascimento))) : '';

            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('Seu {0} cadastro foi finalizado.', 'Aluno'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Aluno'));
        }
        $escolaridades = $this->Alunos->Escolaridades->find('list', ['limit' => 200])->orderAsc('Escolaridades.nome');
        $situacoes = $this->Alunos->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('aluno', 'escolaridades', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aluno = $this->Alunos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aluno = $this->Alunos->patchEntity($aluno, $this->request->getData());
            if ($this->Alunos->save($aluno)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Aluno'));

                return $this->redirect(['controller' => 'Dashboard','action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Aluno'));
        }
        $escolaridades = $this->Alunos->Escolaridades->find('list', ['limit' => 200]);
        $situacoes = $this->Alunos->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('aluno', 'escolaridades', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Aluno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $aluno = $this->Alunos->get($id);
        $aluno->situacao_id = 2;

        if ($this->Alunos->save($aluno)) {
            $this->Flash->success(__('O {0} foi deletado.', 'Aluno'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser deletado. Por favor, tente novamente.', 'Aluno'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
