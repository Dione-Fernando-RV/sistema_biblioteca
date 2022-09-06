<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Chronos\Date;

/**
 * AgendaCursos Controller
 *
 * @property \App\Model\Table\AgendaCursosTable $AgendaCursos
 * @method \App\Model\Entity\AgendaCurso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgendaCursosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CursosTurmas', 'Situacoes'],
        ];

        //AgendaCursos.tipo = 0 é que esse é um curso se for igual a 1 é palestra
        $query =  $this->AgendaCursos->find()
            ->contain(['CursosTurmas' => ['Cursos']])
            ->where(['AgendaCursos.situacao_id' => 1, 'AgendaCursos.tipo' => 0]);
        $agendaCursos = $this->paginate($query);

        $this->set(compact('agendaCursos'));
    }


    /**
     * View method
     *
     * @param string|null $id Agenda Curso id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agendaCurso = $this->AgendaCursos->get($id, [
            'contain' => ['CursosTurmas', 'Situacoes'],
        ]);

        $this->set(compact('agendaCurso'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('CursosTurmas');
        $agendaCurso = $this->AgendaCursos->newEmptyEntity();

        if ($this->request->is('post')) {
            $agendaCurso = $this->AgendaCursos->patchEntity($agendaCurso, $this->request->getData());

            /**
             * Pega o valor do curso para colocar na agenda curso
             */
            $cursoValor = $this->CursosTurmas->get(
                $agendaCurso->turma_id,
                ['contain' => ['Cursos']]
            );
            $agendaCurso->valor_curso = $cursoValor->curso->valor;
            //salvando curso
            $agendaCurso->tipo = 0;
            $agendaCurso->situacao_id = 1;

            if ($this->AgendaCursos->save($agendaCurso)) {
                $this->Flash->success(__('A {0} Foi salvo.', 'Agenda Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não pôde ser salvo. Por favor, tente novamente.', 'Agenda Curso'));
        }

        $turma = $this->AgendaCursos->CursosTurmas->find('list', ['limit' => 200]);
        $getTurmaCurso = $this->AgendaCursos->CursosTurmas->getTurmasCursos();

        $situacoes = $this->AgendaCursos->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('getTurmaCurso','agendaCurso', 'turma', 'situacoes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Agenda Curso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agendaCurso = $this->AgendaCursos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $now = new Date();
            $data['data_inicio'] = $now->createFromFormat('d/m/Y', $data['data_inicio']);
            $data['data_fim'] = $now->createFromFormat('d/m/Y', $data['data_fim']);
            $agendaCurso = $this->AgendaCursos->patchEntity($agendaCurso, $data);
            if ($this->AgendaCursos->save($agendaCurso)) {
                $this->Flash->success(__('A {0} Foi salvo.', 'Agenda Curso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A {0} não pôde ser salvo. Por favor, tente novamente.', 'Agenda Curso'));
        }
        $turma = $this->AgendaCursos->CursosTurmas->find('list');
        $getTurmaCurso = $this->AgendaCursos->CursosTurmas->getTurmasCursos();
        $situacoes = $this->AgendaCursos->Situacoes->find('list', ['limit' => 200]);
        $this->set(compact('agendaCurso', 'getTurmaCurso', 'situacoes'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Agenda Curso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agendaCurso = $this->AgendaCursos->get($id);
        if ($this->AgendaCursos->delete($agendaCurso)) {
            $this->Flash->success(__('A {0} foi deletado.', 'Agenda Curso'));
        } else {
            $this->Flash->error(__('A {0} não pôde ser excluído. Por favor, tente novamente.', 'Agenda Curso'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
