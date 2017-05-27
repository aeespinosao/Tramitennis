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
            <li class="efecto"><a href="<?php echo base_url();?>index.php/login/administrador">Página principal</a></li>
            <li class="dropdown efecto">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de cursos<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_cursos/cargar_vista/crear">Crear curso</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_cursos/cargar_vista/editar">Editar curso</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_cursos/cargar_vista/eliminar">Eliminar curso</a></li>
              </ul>
            </li>
            <li class="dropdown efecto">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de eventos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="efecto"><a href="#">Crear evento</a></li>
                <li class="efecto"><a href="#">Editar evento</a></li>
                <li class="efecto"><a href="#">Eliminar evento</a></li>
              </ul>
            </li>
            <li class="dropdown efecto">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion de horarios <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_horarios/cargar_vista/crear">Crear horario</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_horarios/cargar_vista/editar">Editar horario</a></li>
                <li class="efecto"><a href="<?php echo base_url();?>index.php/admin_horarios/cargar_vista/eliminar">Eliminar horario</a></li>
                <li class="efecto"><a href="#">Disponibilidad de canchas</a></li>
              </ul>
            </li>
            <li class="efecto"><a href="#">Exportar listas</a></li>
            <li class="efecto"><a href="<?php echo base_url();?>index.php/user_authentication/logout">Cerrar Sesión</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    <ol class="breadcrumb">
      <?php foreach($bread as $key => $value){?>
        <li><a href="<?php echo $value[1];?>"><?php echo $value[0];?></a></li>
      <?php } ?>
    </ol>
  </div>
