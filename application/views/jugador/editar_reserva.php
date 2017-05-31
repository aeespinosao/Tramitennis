<div class="col-sm-9" id="contenido">

<?php echo form_open('admin_reservas/guardar_edicion', array('method' => 'post')) ?>
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1">
          <div class="form-group">
            <?php echo form_error('horarios_seleccionados[]'); ?>
            <h4>Seleccione el nuevo horario</h4>
            <table class="table table-hover" id="crear_cursos">
              <thead>
                <th></th>
                <th>Numero</th>
                <th>Fecha de inicio</th>
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
                                    <?php $active_check=''; if(is_array($this->session->flashdata('horarios_checked')) AND in_array($horario->numero, $this->session->flashdata('horarios_checked'))) $active_check='checked'; ?>
                                    <input id="someSwitchOptionSuccess<?php echo $horario->numero; ?>" name="horarios_seleccionados" type="checkbox" value="<?php echo $horario->numero;?>" <?php echo $active_check ?>/>
                                    <label for="someSwitchOptionSuccess<?php echo $horario->numero; ?>" class="label-success"></label>
                                  </div>
                                </td>
                                <td><?php echo $horario->numero; ?></td>
                                <td><?php echo $horario->fecha_inicio; ?></td>
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
      </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
         <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Confirmar nuevo horario</button>
          </div>
        </div>
        <div class="col-sm-8 col-sm-offset-1">
          <div class="form-group">
         <?php
          $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
          echo "<a href='$url'>Atras</a>";
          ?>
          </div>
        </div>           
        
    </div>
  </form>
</div>
