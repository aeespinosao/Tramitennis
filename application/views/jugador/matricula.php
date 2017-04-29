<div class="col-sm-9">
  <?php if(isset($guardado)) { ?>
      <?php if($guardado) { ?>
          <div class="alert alert-success">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              Inscripción satisfactoria
          </div>
      <?php } else { ?>
          <div class="alert alert-danger">
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              No se puede matricular menos de 1 o mas de 2 cursos
          </div>
      <?php } ?>
  <?php } ?>
  Matricular curso
  <?php echo form_open('admin_cursos/matricular_cursos', array('method' => 'post')) ?>
    <table class="table table-hover" id="matricular_cursos">
      <thead>
      <tr>
          <th></th>
          <th>Código</th>
          <th>Nivel</th>
          <th>Horario</th>
          <th>Fecha de inicio</th>
          <th>Fecha de finalizacion</th>
          <th>Hora</th>
      </tr>
      </thead>
      <tbody>
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
              	<div class="form-group">
                  <?php foreach ($cursos as $curso) { ?>
                      <tr>
                        <td>
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess<?php echo $curso->codigo; ?>" name="cursos[]" type="checkbox" value="<?php echo $curso->codigo;?>"/>
                            <label for="someSwitchOptionSuccess<?php echo $curso->codigo; ?>" class="label-success"></label>
                          </div>
                        </td>
                        <td><?php echo $curso->codigo; ?></td>
                        <td><?php echo $curso->nivel; ?></td>
                        <td><?php if($curso->horarioObj) echo $curso->horarioObj->numero; ?></td>
                        <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_inicio; ?></td>
                        <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_fin; ?></td>
                        <td><?php if($curso->horarioObj) echo $curso->horarioObj->hora; ?></td>
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
