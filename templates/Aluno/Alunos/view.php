<section class="content-header">
  <h1>
    Aluno
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
            <dt scope="row"><?= __('Nome') ?></dt>
            <dd><?= h($aluno->nome) ?></dd>
            <dt scope="row"><?= __('Cpf') ?></dt>
            <dd><?= h($aluno->cpf) ?></dd>
            <dt scope="row"><?= __('Telefone') ?></dt>
            <dd><?= h($aluno->telefone) ?></dd>
            <dt scope="row"><?= __('Estado') ?></dt>
            <dd><?= h($aluno->estado) ?></dd>
            <dt scope="row"><?= __('Cidade') ?></dt>
            <dd><?= h($aluno->cidade) ?></dd>
            <dt scope="row"><?= __('Bairro') ?></dt>
            <dd><?= h($aluno->bairro) ?></dd>
            <dt scope="row"><?= __('Rua') ?></dt>
            <dd><?= h($aluno->rua) ?></dd>
            <dt scope="row"><?= __('Escolaridade') ?></dt>
            <dd><?= $aluno->has('escolaridade') ? $this->Html->link($aluno->escolaridade->id, ['controller' => 'Escolaridades', 'action' => 'view', $aluno->escolaridade->id]) : '' ?></dd>
            <dt scope="row"><?= __('Situaco') ?></dt>
            <dd><?= $aluno->has('situaco') ? $this->Html->link($aluno->situaco->id, ['controller' => 'Situacoes', 'action' => 'view', $aluno->situaco->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($aluno->id) ?></dd>
            <dt scope="row"><?= __('Cep') ?></dt>
            <dd><?= $this->Number->format($aluno->cep) ?></dd>
            <dt scope="row"><?= __('Numero') ?></dt>
            <dd><?= $this->Number->format($aluno->numero) ?></dd>
            <dt scope="row"><?= __('Cadastrado Por') ?></dt>
            <dd><?= $this->Number->format($aluno->cadastrado_por) ?></dd>
            <dt scope="row"><?= __('Modeificado Por') ?></dt>
            <dd><?= $this->Number->format($aluno->modeificado_por) ?></dd>
            <dt scope="row"><?= __('Data Nascimento') ?></dt>
            <dd><?= h($aluno->data_nascimento) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($aluno->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($aluno->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Cursos') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($aluno->cursos)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Nome') ?></th>
                    <th scope="col"><?= __('Descricao') ?></th>
                    <th scope="col"><?= __('Situacao Id') ?></th>
                    <th scope="col"><?= __('Cadastrado Por') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modeificado Por') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($aluno->cursos as $cursos): ?>
              <tr>
                    <td><?= h($cursos->id) ?></td>
                    <td><?= h($cursos->nome) ?></td>
                    <td><?= h($cursos->descricao) ?></td>
                    <td><?= h($cursos->situacao_id) ?></td>
                    <td><?= h($cursos->cadastrado_por) ?></td>
                    <td><?= h($cursos->created) ?></td>
                    <td><?= h($cursos->modeificado_por) ?></td>
                    <td><?= h($cursos->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Cursos', 'action' => 'view', $cursos->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Cursos', 'action' => 'edit', $cursos->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cursos', 'action' => 'delete', $cursos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cursos->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
