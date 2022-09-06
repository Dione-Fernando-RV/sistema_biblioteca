<?php

declare(strict_types=1);

namespace App\Controller\Aluno;

use App\Controller\AppController;


/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GrupoUsuario', 'Situacoes'],
        ];
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['GrupoUsuario', 'Situacoes'],
        ]);

        $this->set(compact('usuario'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The {0} has been saved.', 'Usuario'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Usuario'));
        }
        $grupoUsuario = $this->Usuarios->GrupoUsuario->find('list', ['limit' => 200]);
        $situacoes = $this->Usuarios->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'grupoUsuario', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('O {0} foi alterado.', 'Usuario'));

                return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            }
            $this->Flash->error(__('O {0} não pôde ser alterado. Por favor, tente novamente.', 'Usuario'));
        }
        $grupoUsuario = $this->Usuarios->GrupoUsuario->find('list', ['limit' => 200]);
        $situacoes = $this->Usuarios->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('usuario', 'grupoUsuario', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Usuario'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Usuario'));
        }

        return $this->redirect(['action' => 'index']);
    }
}