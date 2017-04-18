<div class="col-sm-9">
  Editar cursos
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Nivel</th>
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
          <td><a href="<?php echo base_url();?>index.php/admin_cursos/editar/<?php echo $curso['codigo'];?>" class="btn btn-primary">Editar</a></td>
        </tr>
       <?php  } ?>

    </tbody>
  </table>
</div>
