<div class="col-sm-9" id="contenido">
  Crear curso
  <?php echo form_open('admin_cursos/crear_nuevo', array('method' => 'post')) ?>
    <!--<div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="text-effect">
                  <span>Nombre</span>
                  <input type="text" name="nombre" class="form-control focus-text" />
              </div>
          </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="radio">
                  <span>Nivel</span>
                      <ul>
                        <li class="col-sm-2">
                          <input type="radio" id="principiante" name="selector_principiante">
                          <label for="principiante">Principiante</label>
                          <div class="check"></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="intermedio" name="selector">
                          <label for="intermedio">Intermedio</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="avanzado" name="selector">
                          <label for="avanzado">Avanzado</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="precompetencia" name="selector">
                          <label for="precompetencia">Precompetencia</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="seleccion" name="selector">
                          <label for="seleccion">Selección</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>
                      </ul>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="text-effect">
                  <span>Cupos</span>
                  <input type="number" name="cupos" class="form-control focus-text" min="0"/>
              </div>
          </div>
        </div>
    </div>
    <table class="table table-hover" id="crear_cursos">
      <thead>
        <th></th>
        <th>Numero</th>
        <th>Fecha de inicio</th>
        <th>Fecha de finalizacion</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Cancha</th>
      </thead>
      <tbody>
          <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                  <?php foreach ($horarios as $horario) { ?>
                      <tr>
                        <td>
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionSuccess<?php echo $horario->numero; ?>" name="cursos_seleccionados[]" type="checkbox" value="<?php echo $horario->numero;?>"/>
                            <label for="someSwitchOptionSuccess<?php echo $horario->numero; ?>" class="label-success"></label>
                          </div>
                        </td>
                        <td><?php echo $horario->numero; ?></td>
                        <td><?php echo $horario->fecha_inicio; ?></td>
                        <td><?php echo $horario->fecha_fin; ?></td>
                        <td><?php echo $horario->hora; ?></td>
                        <td><?php echo $horario->estado; ?></td>
                        <td><?php echo $horario->cancha; ?></td>x
                      </tr>
                   <?php  } ?>
                </div>
              </div>
            </div>
      </tbody>
    </table>

    <br>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Crear</button>
          </div>
        </div>
    </div>
  </form>
</div>
