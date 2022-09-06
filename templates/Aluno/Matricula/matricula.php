<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Confirmação de Matricula</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Curso <?= $cursos->nome . ' | ' . $agendaCursos->cursos_turma->turma ?></h3>
                        </div>
                        <div class="panel-body">
                            <?= $cursos->descricao; ?>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('Disciplinas ') ?></th>
                                        <th scope="col"><?= $this->Paginator->sort('Ministrantes') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($disciplinas as $disciplina) : ?>
                                        <tr>
                                            <td><?= h($disciplina->curso_disciplina->nome) ?></td>
                                            <td><?= h($disciplina->instrutore->nome) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col-md-12 text-center">
                                <br>
                                <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'Matricula', 'action' => 'confirmar', 'prefix' => 'Aluno', $agenda_id, $curso_id, 50], ['confirm' => __('Você sem certeza que deseja se matricular # {0}?', $cursos->nome), 'class' => 'btn-agenda ']) ?>
                                <br><br><br>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>



            </div>
            <!-- /.box -->
        </div>
    </div>
</section>