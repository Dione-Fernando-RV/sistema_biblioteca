<section class="content-header">
  <h1>
    Usuario
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Grupo Usuario') ?></dt>
            <dd><?= $usuario->has('grupo_usuario') ? $this->Html->link($usuario->grupo_usuario->id, ['controller' => 'GrupoUsuario', 'action' => 'view', $usuario->grupo_usuario->id]) : '' ?></dd>
            <dt scope="row"><?= __('Nome') ?></dt>
            <dd><?= h($usuario->nome) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($usuario->email) ?></dd>
            <dt scope="row"><?= __('Senha') ?></dt>
            <dd><?= h($usuario->senha) ?></dd>
            <dt scope="row"><?= __('Situaco') ?></dt>
            <dd><?= $usuario->has('situaco') ? $this->Html->link($usuario->situaco->id, ['controller' => 'Situacoes', 'action' => 'view', $usuario->situaco->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($usuario->id) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
