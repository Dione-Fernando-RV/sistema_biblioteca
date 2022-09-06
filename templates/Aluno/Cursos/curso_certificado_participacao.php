<?php $this->layout = 'certificado'; ?>

<style>
  @media print {
    @page {
      margin: 0;
      size: A4 landscape;
    }

    section {
      page-break-after: always;
    }
  }

  .row {
    display: flex;
    flex-direction: row;
  }

  #pagina1 {
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 5;

    width: 100%;
    background-repeat: no-repeat, no-repeat;
    background-size: 80%, cover;
    background-position: center;
    padding: 50px;
  }

  #pagina1 #conteudo img#logo {
    max-width: 100px;
    width: 100%;
  }

  #pagina1 #conteudo .titulo {
    color: #0B7ABF;
    text-transform: uppercase;
    font-size: 1.6rem;
  }

  #pagina1 #conteudo .subtitulo {
    font-size: 1.3rem;
  }

  #pagina1 #conteudo .nome-aluno {
    font-size: 2.5rem;
  }

  #pagina1 #conteudo {
    max-width: 50%;
    text-align: center;
  }

  #pagina1 #conteudo .rodape #assinatura {
    margin-top: 50px;
    width: 48%;
    border-top: 1px solid #000;
  }

  #pagina1 #conteudo .rodape {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* Pagina 2 */
  #pagina2 {
    background-repeat: no-repeat, no-repeat;
    background-size: 70%, cover;
    background-position: center;
    padding: 60px;
  }

  #pagina22 {
    background-color: #FFFCEF;
    padding: 50px;
    color: #000;
  }

  #pagina2 .header {
    display: flex;
    flex-direction: column;
  }

  #pagina2 .info-longevie {
    margin-bottom: 20px;
  }

  #pagina2 .info-aluno p {
    margin-left: 20px;
  }

  #pagina2 .conteudo-programatico {
    display: flex;
    flex-direction: row;
  }

  #pagina2 .conteudo-programatico ul {
    margin-right: 50px;
  }

  #pagina2 .footer {
    margin-top: 20px;
  }

  #pagina2 .footer h5 {
    margin: 5px 0px;
  }

  #pagina2 .footer ul li {
    margin-bottom: -4px;
    margin-left: -20px;
  }
</style>

<!-- Pagina 1 -->
<section id="pagina1" style='background-image: url("<?= $this->Url->image('certificados/certificado1.jpg') ?>");'>
  <!-- <?php echo $this->Html->image('certificados/certificado1.jpg', ['id' => 'certificado-background']); ?> -->
  <div id="conteudo">
    <?php echo $this->Html->image('mentor/img/logo/longevie-semfundo.png', ['id' => 'logo']); ?>
    <h3 class="titulo">certificado de conclusão </h3>
    <h4 class="titulo subtitulo">certificamos que</h4>
    <h1 class="titulo nome-aluno"><?= $alunos->nome ?></h1>
    <p><?= $cursos->descricao_certificado_aluno ?></p>
    <div class="rodape">
      <div id="assinatura">
        <span></span>
        <p>CESAR MARTON</p>
        <i>Coordenador Geral</i>
      </div>
      <div id="assinatura">
        <span></span>
        <p>MATHEUS CABANHA</p>
        <i>Coordenador de Pedagógico</i>
      </div>
    </div>
  </div>
</section>

<!-- Pagina 2 -->
<section id="pagina2" style='background-image: url("<?= $this->Url->image('certificados/pag2.png') ?>"); background-repeat: no-repeat; background-position: center;  background-size: center;'>
  <!-- <section id="pagina2"> -->
  <div class="header">
    <div class="info-longevie">
      <p>GRUPO LONGEVIE</p>
      <p>CNJP: 82.715.897/0001-02</p>
      <p>LOCAL: VERTIGO PREMIUM STUDIOS</p>
      <p>ENDEREÇO: TRAV. ANA VANI - 51, CAMPO GRANDE, MS</p>
    </div>

    <div class="row info-aluno">
      <p>ALUNO:<?= $alunos->nome ?></p>
      <p>CPF: <?= $alunos->cpf ?></p>
    </div>
    <div class="row info-aluno">
      <p>DATA DE INICIO: </p>
      <p>DATA DE CONCLUSÃO: </p>
    </div>
  </div>
  <div class="footer">
    <h5>Conteúdo Programatico</h5>
    <div class="conteudo-programatico">

      <ul>
        <li><br></li>
        <?php foreach ($grades as $grade) : ?>
          <li><?= $grade->curso_disciplina->nome ?></li>
        <?php endforeach; ?>
      </ul>
      <ul>
        <li>MINISTRANTE</li>
        <?php foreach ($grades as $grade) : ?>
          <li><?= $grade->instrutore->nome ?></li>
        <?php endforeach; ?>
      </ul>

    </div>

    <h5>Registro</h5>
    <p>CERTIFICADO DE Nº: <?= $cursos->id.$alunos->id ?></p>
    <p>COORDENADOR PEDAGÓGICO: MATHEUS CABANHA</p>
  </div>


</section>