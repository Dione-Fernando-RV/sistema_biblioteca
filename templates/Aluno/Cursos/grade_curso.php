<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cursos Alunos
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Curso <?= $cursos->nome  ?></h3>
                    </div>
                    <div class="panel-body">
                        <?= $cursos->descricao; ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Disciplina') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Instrutor') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($grades as $grade) : ?>
                                    <tr>
                                        <td><?= $grade->curso_disciplina->nome ?></td>
                                        <td><?= $grade->instrutore->nome ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="col-md-12 text-right">
                            <?php echo $this->Html->link(__('Voltar'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'btn btn-success btn-xs']) ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>