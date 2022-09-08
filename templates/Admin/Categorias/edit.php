<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categoria
    <small><?php echo __('Editar'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo __(''); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($categoria, ['role' => 'form']); ?>
        <div class="box-body">
          <div class="col-md-6">
            <?php echo $this->Form->control('nome', ['required' => true]); ?>
          </div>
          <div class="col-md-12 text-right">
            <?php echo $this->Form->submit(__('Salvar')); ?>
          </div>
        </div>
        <!-- /.box-body -->
        <?php echo $this->Form->end(); ?>
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
</section>