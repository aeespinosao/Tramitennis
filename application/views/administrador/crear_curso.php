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
                          <input type="radio" id="intermedio" name="selector_intermedio">
                          <label for="intermedio">Intermedio</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="avanzado" name="selector_avanzado">
                          <label for="avanzado">Avanzado</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="precompetencia" name="selector_precompetencia">
                          <label for="precompetencia">Precompetencia</label>
                          <div class="check"><div class="inside"></div></div>
                        </li>

                        <li class="col-sm-2">
                          <input type="radio" id="seleccion" name="selector_seleccion">
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

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="form-group">
              <div class="text-effect">
                  <span>Fecha inicio</span>
                  <input type="date" name="inicio" class="form-control focus-text"/>
              </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="form-group">
              <div class="text-effect">
                  <span>Fecha de finalización</span>
                  <input type="date" name="fin" class="form-control focus-text"/>
              </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="form-group">
              <div class="select">
                  <span>Cancha</span>
                  <select class="form-control" id="select" name="cancha">
                    <?php foreach($canchas as $cancha){ ?>

                    <option value = "<?php echo $cancha->numero?>"><?php echo $cancha->numero?></option>
                  <?php } ?>
                  </select>
              </div>
          </div>
        </div>
    </div><br>
    
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="select">
                  <span>Hora</span>
                  <select class="form-control" id="select" name="horario">
                    <option value = "6">6-8</option>
                    <option value = "8">8-10</option>
                    <option value = "10">10-12</option>
                  </select>
              </div>
          </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Crear</button>
          </div>
        </div>
    </div>
  </form>
</div>
