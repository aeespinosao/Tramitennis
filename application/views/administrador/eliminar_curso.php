<div class="col-sm-9">
  Eliminar cursos
  <table class="table table-hover" id="editar_cursos">
    <thead>
      <th>Código</th>
      <th>Nombre</th>
      <th>Horario</th>
      <th></th>
    </thead>
    <tbody>
      <?php $cursos = array('curso1'=>array('codigo' => '1','nombre'=>'mat','nivel'=>'principiantes'),
    'curso2'=>array('codigo' => '2','nombre'=>'esp','nivel'=>'principiantes'));
      foreach ($cursos as $curso) { ?>
        <tr>
          <td><?php echo $curso['codigo']; ?></td>
          <td><?php echo $curso['nivel']; ?></td>
          <td><?php echo /*$curso['horario']*/1; ?></td>
          <td><a href="<?php echo base_url();?>index.php/admin_cursos/eliminar/<?php echo $curso['codigo'];?>" class="btn btn-danger">Eliminar</a></td>
        </tr>
       <?php  } ?>

    </tbody>
  </table>
</div>
