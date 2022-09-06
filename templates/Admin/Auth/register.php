<?php $this->layout = 'AdminLTE.register'; ?>
<!-- form start -->
<?php echo $this->Form->create($usuario, ['role' => 'form']); ?>
<div class="form-group has-feedback cortextobranco">
  <?= $this->Form->control('nome',['type' => 'text', 'placeholder'=> 'Nome completo']); ?>
</div>
<div class="form-group has-feedback cortextobranco">
  <?= $this->Form->control('email',['type' => 'email', 'placeholder'=> 'E-mail']); ?>
</div>
<div class="form-group has-feedback cortextobranco">
  <?= $this->Form->control('senha',['type' => 'password', 'placeholder'=> 'Senha']); ?>
</div>
<div class="form-group has-feedback cortextobranco" style="visibility: unset;">
  <?= $this->Form->control('confirmar_senha',['type' => 'password', 'placeholder'=> 'Confirmar Senha']); ?>
</div>
<div class="row">
  <div class="col-xs-8">
    <!--  
     <div class="checkbox icheck"> class="cortextobranco"
      <label>
        <input type="checkbox"> I agree to the <a href="#">terms</a>
      </label>
    </div>
   -->
  </div>
  <!-- /.col -->
  <div class="col-xs-0">
  <button type="submit" class="btn btn-roxo  ">Cadastrar</button>

  </div>
  <!-- /.col -->
</div>
<?php echo $this->Form->end(); ?>