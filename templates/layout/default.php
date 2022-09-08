<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$this->disableAutoLayout();

$cakeDescription = 'CEPEF - Biblioteca';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Vendor CSS Files -->
  <?= $this->Html->css('mentor/css/bootstrap.min') ?>
  <?= $this->Html->css(['mentor/css/icofont.min']) ?>
  <?= $this->Html->css(['mentor/css/boxicons.min']) ?>
  <?= $this->Html->css(['mentor/css/remixicon']) ?>
  <?= $this->Html->css(['mentor/css/owl.carousel.min']) ?>
  <?= $this->Html->css(['mentor/css/animate.min']) ?>
  <?= $this->Html->css(['mentor/css/aos']) ?>
  <link rel="icon" type="imagem/jpg" href="mentor/img/logo/logo.jpg" />


  <!-- Template Main CSS File -->
  <?= $this->Html->css(['mentor/css/style']) ?>

  <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home', 'agendas']) ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">

    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto">
        <a href="<?= $this->Url->build('/')?>">
          <?= $this->Html->image('mentor/img/logo/logo.jpg'); ?>
        </a>
      </h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?=$this->request->getParam('action') === 'index' ? 'active' : ''?>">
            <?= $this->Html->link('Inicío', ['action' => 'index']); ?>
          </li>       
          <li class="<?=$this->request->getParam('action') === 'agenda' ? 'active' : ''?>">
            <?= $this->Html->link('Lançamentos', ['action' => 'agenda']); ?>
          </li>
          <li> <a target="blank"
              href="https://api.whatsapp.com/send?phone=5567992036995&text=Quero%20conhecer%20o%20CEPEF%20!">
              Contato</a></li>
          <li></li>
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="courses.html" class="get-started-btn">Get Started</a> -->
      <?= $this->Html->link('Portal do Aluno', ['prefix' => 'Aluno', 'controller' => 'Dashboard', 'action' => 'index'], ['class' => 'get-started-btn']); ?>

    </div>

  </header><!-- End Header -->

  <main id="main">
    <?= $this->fetch('content'); ?>
  </main><!-- End #main -->

  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <!--    <h3>Mentor</h3> -->
            <p>
               R.Antônio da Silva Vendas, 115 - Jardim Bela Vista, <br>
              Campo Grande - MS<br>
              79003-250<br><br>
              <strong>contato:</strong> (67)3357-9000<br>
              <strong>Email:</strong> biblioteca@cepef.com.br<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <!--<h4>Useful Links</h4>-->
            <ul>
              <li>
                <!---<i class="bx bx-chevron-right"></i> <a href="#">Home</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">About us</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Services</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a>-->
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <!-- <h4>Our Services</h4>-->
            <ul>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Web Development</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Product Management</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>-->
              </li>
              <li>
                <!--<i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a>-->
              </li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Biblioteca CEPEF, seu canto da leitura</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <!--
             <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
-->
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <!--    <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
           All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>-->
        <div class="copyright">
          &copy; Copyright <strong>CEPEF</strong>. Todos os direitos reservados
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href=""><i class="icofont-facebook"></i></a>
        <a href=""><i class="icofont-instagram"></i></a>
      </div>
    </div>
    <div class="whatsapp-feature">
      <a target="blank"
        href="https://api.whatsapp.com/send?phone=5567992036995&text=Quero%20falar%20na%20Biblioteca!">
        <?= $this->Html->image('mentor/img/icones/whatsapp.png', ['class' => 'd-none d-lg-block']); ?>
        <?= $this->Html->image('mentor/img/icones/whatsapp.png', ['class' => 'd-block d-lg-none']); ?>

      </a>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <?= $this->Html->script(['mentor/js/jquery.min']) ?>
  <?= $this->Html->script(['mentor/js/bootstrap.bundle.min']) ?>
  <?= $this->Html->script(['mentor/js/jquery.easing.min']) ?>
  <?= $this->Html->script(['mentor/js/validate']) ?>
  <?= $this->Html->script(['mentor/js/jquery.waypoints.min']) ?>
  <?= $this->Html->script(['mentor/js/counterup.min']) ?>
  <?= $this->Html->script(['mentor/js/owl.carousel.min']) ?>
  <?= $this->Html->script(['mentor/js/aos']) ?>

  <!-- Template Main JS File -->
  <?= $this->Html->script(['mentor/js/main']) ?>
</body>

</html>