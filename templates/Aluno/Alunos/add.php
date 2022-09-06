<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno $aluno
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Aluno
    <small><?php echo __('Add'); ?></small>
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
          <h3 class="box-title"><?php echo __('Form'); ?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?php echo $this->Form->create($aluno, ['role' => 'form']); ?>
        <div class="box-body">
          <div class="col-md-6">
            <?php echo $this->Form->control('nome'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('data_nascimento', ['type' => 'text', 'class' => 'form-control datepicker']); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('cpf'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('telefone'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('cep'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('estado'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('cidade'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('bairro'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('rua'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('numero'); ?>
          </div>
          <div class="col-md-6">
            <?php echo $this->Form->control('escolaridade_id', ['options' => $escolaridades, 'empty' => true, 'class' => 'select2']); ?>
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