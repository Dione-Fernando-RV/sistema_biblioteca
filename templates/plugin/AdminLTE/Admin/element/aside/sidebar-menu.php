<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-book"></i>
      <span>Categorias</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo $this->Url->build(['controller' => 'categorias', 'action' => 'index']); ?>"><i class="fa fa-circle-o"></i> Listar</a></li>
      <li><a href="<?php echo $this->Url->build(['controller' => 'categorias', 'action' => 'add']); ?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
    </ul>
  </li>
</ul>