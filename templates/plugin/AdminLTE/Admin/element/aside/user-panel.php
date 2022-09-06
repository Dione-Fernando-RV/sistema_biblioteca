<div class="user-panel">
    <div class="pull-left image">
        <?= $this->Html->image('mentor/img/icones/avatar.png', ['class' => 'img-fluid']); ?>
    </div>
    <div class="pull-left info">
        <p> <?= $_SESSION['Auth']['Admin']['nome'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>