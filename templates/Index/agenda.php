<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>Aprendendo hoje,<br>liderando amanhã</h1>
    <h2>Somos uma equipe de mudanças</h2>
    <a href="https://api.whatsapp.com/send?phone=5567981183445&text=Quero%20conhecer%20o%20Grupo%20Longevie!" target="_blank" class="btn-get-started">Fale com um consultor</a>
  </div>
</section><!-- End Hero -->


<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg">
  <div class="container">

    <div class="row counters">

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">1232</span>
        <p>Alunos</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">64</span>
        <p>Cursos</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">42</span>
        <p>Eventos</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">15</span>
        <p>Projetos Sociais</p>
      </div>

    </div>

  </div>
</section>
<section id="counts" class="counts section-bg">
  <div class="container">
    <div class="row counters">
      <div class="col-12 text-center">
        <span>Inscrições abertas para Cursos</span>
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
          foreach ($agendaCursos as $agenda) : ?>
            <!-- Agenda de Cursos -->
            <?php if( $agenda->cursos_turma->curso->tipo_curso_id != 4):?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box-n-agenda">
                <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                <p></p><strong><?= $this->Time->format($agenda->data_inicio, 'dd/MM/YYYY') ?> a
                  <?= $this->Time->format($agenda->data_fim, 'dd/MM/YYYY') ?></strong>
                <h4>Sobre o curso</h4>
                <p><?= $agenda->cursos_turma->curso->descricao  ?></p><br>
                <div class="col text-center">
                  <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'Matricula', 'action' => 'confirmar', 'prefix' => 'Aluno', $agenda->id, $agenda->cursos_turma->curso->id], ['class' => 'btn-agenda ']) ?>
                  <a href="<?php echo $this->Url->build(['action' => 'conteudo_curso',]); ?> " target="_blank">
                    <div class="mais-conteudo"> + ver conteúdo do curso </div>
                  </a>
                </div>
              </div>
            </div>
            <?php endif;?>
            <!-- Fim da Agenda de Cursos -->           
          <?php endforeach; ?>
        </div>
      </div>
    </div>
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

<!-- End Counts Section -->
<section id="counts" class="counts section-bg">
  <div class="container">
    <div class="boxs-cursos">
      <div class="container">
        <div class="row">
          <?php
          foreach ($agendaCursos as $agenda) : ?>    
            <!-- Conferencia Agenda -->
            <?php if( $agenda->cursos_turma->curso->tipo_curso_id == 4):?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box-n-agenda">
                <h2><?= $agenda->cursos_turma->curso->nome . ' | ' .  $agenda->cursos_turma->turma; ?></h2>
                <h3><?= $agenda->cidade . '/' . $agenda->estado; ?></h3>
                <p></p><strong><?= $this->Time->format($agenda->data_inicio, 'dd/MM/YYYY') ?> a
                  <?= $this->Time->format($agenda->data_fim, 'dd/MM/YYYY') ?></strong>
                <h4>Sobre a conferência</h4>
                <p><?= $agenda->cursos_turma->curso->descricao  ?></p><br>
                <div class="col text-center">
                  <?php echo $this->Html->link(__('Matrícular no Curso'), ['controller' => 'Matricula', 'action' => 'confirmar', 'prefix' => 'Aluno', $agenda->id, $agenda->cursos_turma->curso->id], ['class' => 'btn-agenda ']) ?>
                  <a href="<?php echo $this->Url->build(['action' => 'conteudo_curso',]); ?> " target="_blank">
                    <div class="mais-conteudo"> + ver conferência </div>
                  </a>
                </div>
              </div>
            </div>
            <?php endif;?>
            <!-- Fim Conferencia agenda -->
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>