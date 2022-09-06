<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->css('AdminLTE./bower_components/bootstrap/dist/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
  <?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
  <!-- Ionicons -->
  <?php echo $this->Html->css('AdminLTE./bower_components/Ionicons/css/ionicons.min'); ?>
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <?php echo $this->fetch('css'); ?>
  <?php echo $this->Html->css('login'); ?>
  <?php echo $this->Html->css('style'); ?>

</head>

<body class="hold-transition login-page " id="tudo">
  <div class="login-box login-content">
    <div class="login-logo">
    <a href="<?php echo $this->Url->build(); ?>" target="_blank" ><i class="cortextobranco"> <b>CEPEF</b></i></a>
    </div>
    <!-- /.login-logo -->
    <div>
      <?= $this->Flash->render() ?>
      <p class="cortextobranco title-main">Login</p>

      <?php echo $this->fetch('content'); ?>

      <?php if (Configure::read('Theme.login.show_social')): ?>
      <div class="social-auth-links text-center">
        <p class = 'cortextobranco'>- OU -</p>
        <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div> -->
        <?php endif; ?>

        <?php if (Configure::read('Theme.login.show_remember')): ?>
         <!-- <a href="#">Recuperar senha</a><br> -->
        <?php endif; ?>
        <a href="<?=$this->Url->build(['controller' => 'Auth','prefix' => 'Admin', 'action' => 'register'])?>"
          class="text-center"><h4>Registrar</h4> </a>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
    <!-- Bootstrap 3.3.7 -->
    <?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
    <!-- iCheck -->
    <?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

    <?php echo $this->fetch('script'); ?>

    <?php echo $this->fetch('scriptBottom'); ?>

    <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
    </script>
</body>

</html>