<div class="jumbotron">
  <div class="container">
  </div>
</div>
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="visible-xs navbar-brand">Tramitennis</a>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul id="top-menu" class="nav navbar-nav">
            <li class="efecto"><a href="<?php echo base_url();?>index.php/login/jugador">Página principal</a></li>
            <li class="dropdown efecto">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de cursos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_cursos/cargar_vista/matricular">Matricular curso</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_cursos/cargar_vista/cancelar">Cancelar curso</a></li>
              </ul>
            </li>
            
            <li class="dropdown efecto">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de reservas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_reservas/cargar_vista/hacer">Hacer reserva</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_reservas/cargar_vista/editar">Editar reserva</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_reservas/cargar_vista/eliminar">Eliminar reserva</a></li>
              </ul>
            </li>
            <li class="efecto"><a href="<?php echo base_url();?>index.php/autenticacion/logout">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php
    if (isset($saved)) {
        echo $saved;      }
      ?>
  </div>

  <div class="col-sm-9">
    <ol class="breadcrumb">
      <?php foreach($bread as $value){?>
        <li><a href="<?php echo $value[1];?>"><?php echo $value[0];?></a></li>
      <?php } ?>

    </ol>
  </div>
