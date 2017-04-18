<div class="col-sm-9">
  <?php
    if($this->session->flashdata('success')) {?>
      <div class="alert alert-success">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success');?>
      </div>
  <?php } ?>
  Eliminar cursos
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Nombre</th>
      <th>Horario</th>
      <th></th>
    </thead>
    <tbody>
      <?php
      foreach ($cursos as $curso) { ?>
        <tr>
          <td><?php echo $curso->codigo; ?></td>
          <td><?php echo $curso->nivel; ?></td>
          <td><?php echo $curso->horario; ?></td>
          <td><a href="<?php echo base_url();?>index.php/admin_cursos/eliminar/<?php echo $curso->codigo."/".$curso->horario;?>" class="btn btn-danger">Eliminar</a></td>
        </tr>
       <?php  } ?>

    </tbody>
  </table>
</div>
