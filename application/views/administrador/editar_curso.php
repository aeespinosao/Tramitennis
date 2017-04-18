<div class="col-sm-9" id="contenido">
  Editar curso <?php echo $curso[0]->codigo; ?>
  <?php echo form_open('admin_cursos/guardar_edicion', array('method' => 'post')) ?>
    <!--<div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="text-effect">
                  <span>Nombre</span>
                  <input type="text" name="nombre" class="form-control focus-text" value="<?php echo $curso['nombre']; ?>"/>
              </div>
          </div>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="radio">
                  <span>Nivel</span>
                      <ul>
                        <li class="col-sm-2">
                          <?php $active_radio=''; if ($select=='principiante') $active_radio='checked'; ?>
                          <input type="radio" id="principiante" name="selector" value="principiante" <?php echo $active_radio ?>>
                          <label for="principiante">Principiante</label>
                          <div class="check"></div>
                        </li>

                        <li class="col-sm-2">
                          <?php $active_radio=''; if ($select=='intermedio') $active_radio='checked'; ?>
                          <input type="radio" id="intermedio" name="selector" value="intermedio" <?php echo $active_radio ?>>
                          <label for="intermedio">Intermedio</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <?php $active_radio=''; if ($select=='avanzado') $active_radio='checked'; ?>
                          <input type="radio" id="avanzado" name="selector" value="avanzado" <?php echo $active_radio ?>>
                          <label for="avanzado">Avanzado</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <?php $active_radio=''; if ($select=='precompetencia') $active_radio='checked'; ?>
                          <input type="radio" id="precompetencia" name="selector" value="precompetencia" <?php echo $active_radio ?>>
                          <label for="precompetencia">Precompetencia</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <?php $active_radio=''; if ($select=='seleccion') $active_radio='checked'; ?>
                          <input type="radio" id="seleccion" name="selector" value="seleccion" <?php echo $active_radio ?>>
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
                  <input type="number" name="cupos" class="form-control focus-text" min="0" value="<?php echo $curso[0]->cupos_disponibles; ?>"/>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="form-group">
            <?php echo form_error('horario'); ?>
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
                          <tr>
                                <td>
                                  <div class="material-switch pull-right">
                                    <input id="someSwitchOptionSuccess<?php echo $horario_propio[0]->numero; ?>" name="horario_propio[]" type="checkbox" value="<?php echo $horario_propio[0]->numero;?>" checked/>
                                    <label for="someSwitchOptionSuccess<?php echo $horario_propio[0]->numero; ?>" class="label-success"></label>
                                  </div>
                                </td>
                                <td><?php echo $horario_propio[0]->numero; ?></td>
                                <td><?php echo $horario_propio[0]->fecha_inicio; ?></td>
                                <td><?php echo $horario_propio[0]->fecha_fin; ?></td>
                                <td><?php echo $horario_propio[0]->hora; ?></td>
                                <td><?php echo $horario_propio[0]->estado; ?></td>
                                <td><?php echo $horario_propio[0]->cancha; ?></td>
                              </tr>
                          <?php foreach ($horarios as $horario) { ?>
                              <tr>
                                <td>
                                  <div class="material-switch pull-right">
                                    <input id="someSwitchOptionSuccess<?php echo $horario->numero; ?>" name="horarios_seleccionados" type="checkbox" value="<?php echo $horario->numero;?>"/>
                                    <label for="someSwitchOptionSuccess<?php echo $horario->numero; ?>" class="label-success"></label>
                                  </div>
                                </td>
                                <td><?php echo $horario->numero; ?></td>
                                <td><?php echo $horario->fecha_inicio; ?></td>
                                <td><?php echo $horario->fecha_fin; ?></td>
                                <td><?php echo $horario->hora; ?></td>
                                <td><?php echo $horario->estado; ?></td>
                                <td><?php echo $horario->cancha; ?></td>
                              </tr>
                           <?php  } ?>
                        </div>
                      </div>
                    </div>
              </tbody>
            </table>
          </div>
        </div>
      </div><br>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Actualizar</button>
          </div>
        </div>
    </div>
  </form>
</div>
