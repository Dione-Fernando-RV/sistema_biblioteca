<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Cursos Controller
 *
 * @property \App\Model\Table\CursosTable $Cursos
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CursosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cursos->find('all')
            ->contain(['Situacoes', 'Usuarios', 'UsuariosEdit'])
            ->where(['Cursos.situacao_id ' => '1']);

        $nome = null;
        if($this->request->getQuery('nome')) {
            $nome = $this->request->getQuery('nome');
            $query->andWhere(['Cursos.nome LIKE' => "%$nome%"]);
        }

        $cursos = $this->paginate($query);

        $this->set(compact('cursos', 'nome'));
    }

    /**
     * View method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => ['Situacoes'],
        ]);

        $this->set(compact('curso'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $curso = $this->Cursos->newEmptyEntity();
        if ($this->request->is('post')) {          
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            $curso->anexo_nome = $_FILES['anexo']['name'];
            
            $curso->situacao_id = 1;
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Curso'));
        }
        $situacoes = $this->Cursos->Situacoes->find('list', ['limit' => 200]);
        $tipoCursos = $this->Cursos->TipoCurso->find('list', ['limit' => 200]);

        $this->set(compact('curso', 'situacoes', 'tipoCursos'));
    }


    /**  cake bake all tipo_curso --theme AdminLTE --prefix admin
     * Edit method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            if ($this->Cursos->save($curso)) {
                $this->Flash->success(__('O {0} foi salvo.', 'Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Curso'));
        }
        $situacoes = $this->Cursos->Situacoes->find('list', ['limit' => 200]);
        $tipoCursos = $this->Cursos->TipoCurso->find('list', ['limit' => 200]);

        $this->set(compact('curso', 'situacoes','tipoCursos'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $curso = $this->Cursos->get($id);
        $curso->situacao_id = 2;
        if ($this->Cursos->save($curso)) {
            $this->Flash->success(__('O {0} foi deletado.', 'Curso'));
        } else {
            $this->Flash->error(__('O {0} não pôde ser deletado. Por favor, tente novamente.', 'Curso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
