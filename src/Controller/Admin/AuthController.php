<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

class AuthController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user && $user['grupo_usuario_id'] === 1) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Seu login ou senha estão incorretos!');
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    public function register()
    {
        $this->loadModel('Usuarios');
        $this->loadModel('Alunos');
        
        $usuario = $this->Usuarios->newEmptyEntity();

        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            $aluno = $this->Alunos->newEmptyEntity();
            if ($this->request->is('post')) {
                $aluno->nome = $usuario->nome;
                $aluno->situacao_id = 1;
                $aluno->cadastro_completo = 0;
                if ($this->Alunos->save($aluno)) {
                    $usuario->grupo_usuario_id = 1;
                    $usuario->situacao_id = 1;
                    $usuario->aluno_id = $aluno->id;
                    $this->Usuarios->save($usuario);
                    $this->Flash->success(__('O {0} foi registrado, realize seu login.', 'Usuario'));

                    return $this->redirect(['controller' => 'Auth', 'prefix' => 'Aluno', 'action' => 'login']);
                }
                $this->Flash->error(__('O {0} não pôde ser salvo. Por favor, tente novamente.', 'Aluno'));
            }
        }
        $this->set(compact('usuario'));
    }
}
