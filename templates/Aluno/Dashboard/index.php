<script>

</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Meus Cursos
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                <!--
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                -->
                <th></th>
                <th scope="col"><?= $this->Paginator->sort('Curso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agenda_id', 'Turma') ?></th>
                <th scope="col"><?= $this->Paginator->sort('aluno_id') ?></th>
                <th scope="col" class="pager"><?= $this->Paginator->sort('Grade Curricular') ?></th>

                <!-- <th scope="col" class="actions"><?= __('Ação') ?></th>   -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($cursosAlunos as $cursosAluno) : ?>
                <?php if ($cursosAluno->liberar_curso == 1) : ?>
                  <tr>
                    <!--
                  <td><?= h($cursosAluno->id) ?></td>
                   -->
                    <td></td>
                    <td><?= h($cursosAluno->agenda_curso->cursos_turma->curso->nome) ?></td>
                    <td><?= h($cursosAluno->agenda_curso->cursos_turma->turma) ?></td>
                    <td><?= h($cursosAluno->aluno->nome) ?></td>
                    <td class="pager"> <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Cursos', 'action' => 'gradeCurso', $cursosAluno->agenda_curso->cursos_turma->curso->id], ['escape' => false, 'class' => 'btn btn-warning btn-xs dropdown-toggle', 'title' => 'Visualizar']) ?></td>
                    <td class="pager"><?= $this->Html->link('<i class="fa fa-file-pdf-o"></i>', ['controller' => 'Cursos', 'action' => 'certificados', $cursosAluno->id, $cursosAluno->agenda_curso->cursos_turma->id, $cursosAluno->aluno->id, 20], ['escape' => false, 'class' => 'btn btn-success btn-xs dropdown-toggle', 'target' => '_blank', 'title' => 'Cert. Participação']) ?></td>
                    <?php if ($cursosAluno->voluntario == 1) : ?>
                      <td class="pager"><?= $this->Html->link('<i class="fa fa-file-pdf-o"></i>', ['controller' => 'Cursos', 'action' => 'certificados', $cursosAluno->id, $cursosAluno->agenda_curso->cursos_turma->id, $cursosAluno->aluno->id, 30], ['escape' => false, 'class' => 'btn btn-success btn-xs dropdown-toggle', 'target' => '_blank', 'title' => 'Cert. Apoio']) ?></td>
                    <?php endif; ?>
                    <?php if ($cursosAluno->ministrante == 1) : ?>
                      <td class="pager"><?= $this->Html->link('<i class="fa fa-file-pdf-o"></i>', ['controller' => 'Cursos', 'action' => 'certificados', $cursosAluno->id, $cursosAluno->agenda_curso->cursos_turma->id, $cursosAluno->aluno->id, 40], ['escape' => false, 'class' => 'btn btn-success btn-xs dropdown-toggle', 'target' => '_blank', 'title' => 'Cert. Ministrante']) ?></td>
                    <?php endif; ?>
                    <!--
                  <td class="actions">
                    <div class="col-md-8 col-lg-8">
                      <div class="dropdown">
                        <button class="btn btn-info btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="fa fa-list"></span> Opções
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-prontuario">
                          <li>
                            <?= $this->Html->link('<i class="fa fa-file-pdf-o"></i> Gerar Certificado', ['controller' => 'Cursos', 'action' => 'certificados', $cursosAluno->id], ['escape' => false]) ?>
                          </li>
                          <li>
                            <?= $this->Html->link('<i class="fa fa-eye"></i> Visualizar', ['controller' => 'Cursos', 'action' => 'gradeCurso', $cursosAluno->id, $cursosAluno->aluno_id], ['escape' => false]) ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
              -->
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>