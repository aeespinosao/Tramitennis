<div class="col-sm-9">
  Matricular curso
  <form action="" name="matricular" method="post">
    <table class="table table-hover" id="matricular_cursos">
      <thead>
        <th></th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Nivel</th>
        <th>Horario</th>
      </thead>
      <tbody>
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
              	<div class="form-group">
                  <?php $cursos = array('curso1'=>array('codigo' => '1','nombre'=>'mat','nivel'=>'principiantes'),
                'curso2'=>array('codigo' => '2','nombre'=>'esp','nivel'=>'principiantes'));
                  foreach ($cursos as $curso) { ?>
                      <tr>
                        <td>
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess<?php echo $curso['codigo']; ?>" name="cursos_seleccionados" type="checkbox" value="<?php echo $curso['codigo'];?>"/>
                            <label for="someSwitchOptionSuccess<?php echo $curso['codigo']; ?>" class="label-success"></label>
                          </div>
                        </td>
                        <td><?php echo $curso['codigo']; ?></td>
                        <td><?php echo $curso['nombre']; ?></td>
                        <td><?php echo $curso['nivel']; ?></td>
                        <td><?php echo 1; ?></td>
                      </tr>
                   <?php  } ?>
                </div>
              </div>
            </div>
      </tbody>
    </table>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
         <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Confirmar matrícula</button>
          </div>
        </div>
    </div>
  </form>
</div>
