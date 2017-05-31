<div class="col-sm-9">
  <?php
    if($this->session->flashdata('success')) {?>
      <div class="alert alert-success">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success');?>
      </div>
  <?php } ?>
  <h3>Eliminar reservas</h3> 
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Horario</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th></th>
    </thead>
    <tbody>
      <?php

      foreach ($reservas as $reserva) { ?>
        <tr>
          <td><?php echo $reserva->codigo; ?></td>
          <td><?php if($reserva->horarioObj) echo $reserva->horarioObj->numero; ?></td>
          <td><?php if($reserva->horarioObj) echo $reserva->horarioObj->fecha_inicio; ?></td>
          <td><?php if($reserva->horarioObj) echo $reserva->horarioObj->hora; ?></td>
          <td><a href="<?php echo base_url();?>index.php/admin_reservas/eliminar/<?php echo $reserva->codigo."/".$reserva->horario;?>" onclick="return confirmation()" class="btn btn-danger">Eliminar</a></td>
        </tr>
       <?php  } ?>

    </tbody>
  </table>
</div>
<script type="text/javascript">

<!--

function confirmation() {

    if(confirm("¿Desea eliminar eliminar la reserva?"))

    {

        return true;

    }

    return false;

}

//-->

</script>
