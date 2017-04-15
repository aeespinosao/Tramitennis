<div class="col-sm-9" id="contenido">
  Editar curso <?php echo $curso['codigo']; ?>
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
                  <input type="number" name="cupos" class="form-control focus-text" min="0" value="<?php echo $curso['cupos']; ?>"/>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
              <div class="select">
                  <span>Horario</span>
                  <select class="form-control" id="select">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                  </select>
              </div>
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
