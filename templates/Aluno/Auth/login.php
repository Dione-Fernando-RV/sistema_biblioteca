<?php $this->layout = 'AdminLTE.login'; ?>

<?= $this->Form->create() ?>
<div class="form-group has-feedback cortextobranco">
  <input type="text" class="form-control" placeholder="E-mail" name="email">
  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback cortextobranco">
  <input type="password" class="form-control" placeholder="Senha" name="senha">
  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
  <div class="col-xs-8">
    <div class="checkbox icheck">
      <label class="cortextobranco">
        <input type="checkbox"> Manter logado
      </label>
    </div>
  </div>
  <div class="col-xs-4">
  <button type="submit" class="btn btn-roxo">Logar</button>
  </div>
</div>
<?= $this->Form->end() ?>