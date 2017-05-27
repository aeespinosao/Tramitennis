<div class="col-sm-9">
  <?php
    if($this->session->flashdata('success')) {?>
      <div class="alert alert-success">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success');?>
      </div>
  <?php } ?>
  <h3>Editar horarios</h3> 
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Fecha de inicio</th>
      <th>Fecha de finalización</th>
      <th>Hora</th>
      <th>Cancha</th>
      <th></th>
    </thead>
    <tbody>
      <?php
      foreach ($horarios as $horario) { ?>
        <tr>
          <td><?php echo $horario->numero; ?></td>
          <td><?php echo $horario->fecha_inicio; ?></td>
          <td><?php echo $horario->fecha_fin; ?></td>
          <td><?php echo $horario->hora; ?></td>
          <td><?php echo $horario->cancha; ?></td>
          <td><a href="<?php echo base_url();?>index.php/admin_horarios/editar/<?php echo $horario->numero;?>" class="btn btn-primary">Editar</a></td>
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
