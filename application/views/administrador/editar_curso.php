<div class="col-sm-9" id="contenido">
  Editar curso <?php echo $curso[0]->codigo; ?>
  <form class="" action="index.html" method="post">
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
                          <input type="radio" id="principiante" name="selector">
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
                          <label for="precompetencia">Precomoetencia</label>
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
                                    <input id="someSwitchOptionSuccess<?php echo $horario_propio->numero; ?>" name="horarios_seleccionados[]" type="checkbox" value="<?php echo $horario_propio->numero;?>"/>
                                    <label for="someSwitchOptionSuccess<?php echo $horario_propio->numero; ?>" class="label-success"></label>
                                  </div>
                                </td>
                                <td><?php echo $horario_propio->numero; ?></td>
                                <td><?php echo $horario_propio->fecha_inicio; ?></td>
                                <td><?php echo $horario_propio->fecha_fin; ?></td>
                                <td><?php echo $horario_propio->hora; ?></td>
                                <td><?php echo $horario_propio->estado; ?></td>
                                <td><?php echo $horario_propio->cancha; ?></td>
                              </tr>
                          <?php foreach ($horarios as $horario) { ?>
                              <tr>
                                <td>
                                  <div class="material-switch pull-right">
                                    <input id="someSwitchOptionSuccess<?php echo $horario->numero; ?>" name="horarios_seleccionados[]" type="checkbox" value="<?php echo $horario->numero;?>"/>
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
