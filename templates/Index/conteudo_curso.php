<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg">
  <div class="container">

    <div class="row counters">

      <div class="col-lg-3 col-6 text-center">
        <span></span>
        <p></p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span></span>
        <p></p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span></span>
        <p></p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span></span>
        <p></p>
      </div>
    </div>

  </div>
</section>
<!-- End Counts Section -->

<section id="counts" class="counts section-bg">
  <div class="container">
    <div class="boxs-cursos">
      <div class="container">
        <div class="row">
          <?php
          foreach ($disciplinas as $agenda) : ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="box-n-agenda">
                <div class="col text-center">
                  <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                  <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                </div>
                <p></p><strong>
                </strong>
                <h4>Disciplinas do curso</h4>
                <p><?= $agenda->cursos_turma->curso->descricao  ?></p><br>
                <?php
                foreach ($agenda->cursos_turma->curso->curso_disciplinas as $disciplina) : ?>
                  <strong>
                    <p><?= $disciplina->nome ?></p>
                  </strong>
                <?php endforeach; ?>
                <div class="col text-center">
                  <?php echo $this->Html->link(__('Voltar'), ['action' => 'agenda'], ['class' => 'btn-agenda ']) ?>

                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!--
          <?php
          foreach ($disciplinas as $disciplina) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box-n-agenda">
                <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                <p></p><strong><?= $this->Time->format($agenda->data_inicio, 'dd/MM/YYYY') ?> a
                  <?= $this->Time->format($agenda->data_fim, 'dd/MM/YYYY') ?></strong>
                <h4>Sobre o curso</h4>
                <p><?= $agenda->cursos_turma->curso->descricao  ?></p><br>
                <div class="col text-center">
                  <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'cursos-alunos', 'action' => 'add'], ['class' => 'btn-agenda ']) ?>
                  <a href="<?php echo $this->Url->build(['action' => 'conteudo_curso',]); ?> " target="_blank">
                    <div class="mais-conteudo"> + ver conteúdo do curso </div>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

          -->
        </div>
      </div>
    </div>
  </div>
</section>