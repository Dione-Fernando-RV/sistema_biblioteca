<style>
  .counts {
    padding: 30px 0;
  }

  .counts .counters span {
    font-size: 28px;
    display: block;
    color: #007c3c;
    font-weight: 700;
  }

  .counts .counters p {
    padding: 0;
    margin: 0 0 20px 0;
    font-family: "Raleway", sans-serif;
    font-size: 15px;
    font-weight: 600;
    color: #37423b;
  }
</style>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Agendas
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
        <div class="box-body no-padding">
          <section id="counts" class="counts section-bg">
            <div class="container">
              <div class="row counters">
                <div class="col-12 text-center">
                  <span>Inscrições abertas para Cursos</span>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="row">
              <?php
              foreach ($agendaCursos as $agenda) : ?>
                <!-- Agenda de Cursos -->
                <?php if ($agenda->cursos_turma->curso->tipo_curso_id != 4) : ?>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box-n-agenda">
                      <div>
                        <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                        <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                        <p></p><strong><?= $this->Time->format($agenda->data_inicio, 'dd/MM/YYYY') ?> a
                          <?= $this->Time->format($agenda->data_fim, 'dd/MM/YYYY') ?></strong>
                        <h4>Sobre o curso</h4>
                        <p><?= substr($agenda->cursos_turma->curso->descricao, 0, 50) . '...';  ?></p><br>
                      </div>
                      <div class="col text-center footer">
                        <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'Matricula', 'action' => 'matricula', 'prefix' => 'Aluno', $agenda->id, $agenda->cursos_turma->id], ['class' => 'btn-agenda ']) ?>
                        <a href="<?php echo $this->Url->build(['action' => 'conteudo_curso', $agenda->id, $agenda->cursos_turma->curso->id]); ?> " target="_blank">
                          <div class="mais-conteudo"> + ver conteúdo do curso </div>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- Fim da Agenda de Cursos -->
              <?php endforeach; ?>
            </div>
          </section>

          <section id="counts" class="counts section-bg">
            <div class="container">
              <div class="row counters">
                <div class="col-12 text-center">
                  <span>Inscrições abertas para Conferências</span>
                </div>
              </div>
            </div>
          </section>

          <section>
            <div class="row">
              <?php
              foreach ($agendaCursos as $agenda) : ?>
                <!-- Agenda de Cursos -->
                <?php if ($agenda->cursos_turma->curso->tipo_curso_id == 4) : ?>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box-n-agenda">
                      <div>
                        <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                        <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                        <p></p><strong><?= $this->Time->format($agenda->data_inicio, 'dd/MM/YYYY') ?> a
                          <?= $this->Time->format($agenda->data_fim, 'dd/MM/YYYY') ?></strong>
                        <h4>Sobre a conferência</h4>
                        <p><?= substr($agenda->cursos_turma->curso->descricao, 0, 50) . '...';  ?></p><br>
                      </div>
                      <div class="col text-center footer">
                        <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'Matricula', 'action' => 'matricula', 'prefix' => 'Aluno', $agenda->id, $agenda->cursos_turma->id], ['class' => 'btn-agenda ']) ?>
                        <a href="<?php echo $this->Url->build(['action' => 'conteudo_curso', $agenda->id, $agenda->cursos_turma->curso->id]); ?> " target="_blank">
                          <div class="mais-conteudo"> + ver conteúdo da conferência </div>
                        </a>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- Fim da Agenda de Cursos -->
              <?php endforeach; ?>
            </div>
          </section>
          <div class="col-md-12 text-right">
            <?php echo $this->Html->link(__('Voltar'), ['controller' => 'dashboard', 'action' => 'index'], ['class' => 'btn btn-success btn-xs']) ?>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>