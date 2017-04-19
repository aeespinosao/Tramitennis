<div class="col-sm-9">
  <?php
    if($this->session->flashdata('success')) {?>
      <div class="alert alert-success">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success');?>
      </div>
  <?php } ?>
  <h3>Eliminar cursos</h3> 
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Nombre</th>
      <th>Horario</th>
      <th>Fecha de inicio</th>
      <th>Fecha de finalizacion</th>
      <th>Hora</th>
      <th></th>
    </thead>
    <tbody>
      <?php
      foreach ($cursos as $curso) { ?>
        <tr>
          <td><?php echo $curso->codigo; ?></td>
          <td><?php echo $curso->nivel; ?></td>
          <td><?php if($curso->horarioObj) echo $curso->horarioObj->numero; ?></td>
          <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_inicio; ?></td>
          <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_fin; ?></td>
          <td><?php if($curso->horarioObj) echo $curso->horarioObj->hora; ?></td>
          <td><a href="<?php echo base_url();?>index.php/admin_cursos/eliminar/<?php echo $curso->codigo."/".$curso->horario;?>" onclick="return confirmation()" class="btn btn-danger">Eliminar</a></td>
        </tr>
       <?php  } ?>

    </tbody>
  </table>
</div>
<script type="text/javascript">

<!--

function confirmation() {

    if(confirm("¿Desea eliminar eliminar el curso?"))

    {

        return true;

    }

    return false;

}

//-->

</script>
