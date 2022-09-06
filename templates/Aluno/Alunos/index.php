<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Alunos</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <!--
            <div class="box-tools">
              <form action="<?php echo $this->Url->build(); ?>" method="POST">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            -->
        </div>


        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <!--  
        <div class="pull-right"><?php echo $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'btn btn-success']) ?></div>
          -->
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome', 'Aluno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_nascimento', 'Dt. Nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('escolaridade_id', 'Escolaridade') ?></th>

                <th class="actions"><?= __('Ações') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alunos as $aluno) : ?>
                <tr>
                  <td><?= $this->Number->format($aluno->id) ?></td>
                  <td><?= h($aluno->nome) ?></td>
                  <td><?= h($aluno->data_nascimento) ?></td>
                  <td><?= h($aluno->cpf) ?></td>
                  <td><?= h($aluno->telefone) ?></td>
                  <td><?= h($aluno->escolaridade->nome) ?></td>
                  <!--  <td><?= $this->Number->format($aluno->cep) ?></td>
                  <td><?= h($aluno->estado) ?></td>
                  <td><?= h($aluno->cidade) ?></td>
                  <td><?= h($aluno->bairro) ?></td>
                  <td><?= h($aluno->rua) ?></td>
                  <td><?= $this->Number->format($aluno->numero) ?></td>-->

                  <td class="actions">
                    <div class="col-md-8 col-lg-8">
                      <div class="dropdown">
                        <button class="btn btn-info btn-xs dropdown-toggle" type="button" data-toggle="dropdown">
                          <span class="fa fa-list"></span> Opções
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-prontuario">
                          <li>
                            <?= $this->Html->link('<i class="fa fa-eye"></i> Visualizar', ['action' => 'view', $aluno->id], ['escape' => false]) ?>
                          </li>
                          <li>
                            <?= $this->Html->link('<i class="fa fa-pencil-square-o"></i> Editar', ['action' => 'edit', $aluno->id], ['escape' => false]) ?>

                          </li>
                          <li>
                            <?= $this->Html->link('<i class="fa fa-remove"></i> Deletar', ['action' => 'delete', $aluno->id], ['confirm' => __('Você tem certeza que deseja excluir o registro # {0}?', $aluno->id), 'escape' => false]) ?>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>