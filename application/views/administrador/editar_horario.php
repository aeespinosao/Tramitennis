<div class="col-sm-9" id="contenido">
  <?php
    if($this->session->flashdata('success')) {?>
      <div class="alert alert-success">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('success');?>
      </div>
  <?php } ?>

  <?php
    if($this->session->flashdata('danger')) {?>
      <div class="alert alert-danger">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <?php echo $this->session->flashdata('danger');?>
      </div>
  <?php } ?>
  <h3>Editar horario</h3>

  <?php echo form_open('admin_horarios/guardar_edicion', array('method' => 'post')) ?>
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
            <div class="col-sm-5 ">
              <?php echo form_error('fecha_inicio'); ?>
                <h4><span>Fecha de inicio</span></h4>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" name="fecha_inicio" value="<?php echo date('m/d/Y', strtotime($horario[0]->fecha_inicio)); ?>" style="border-left: 0px; border-top: 0px; border-right: 0px;">
              </div>
            </div>
            <div class="col-sm-5">
              <?php echo form_error('fecha_fin'); ?>
                <h4><span>Fecha de finalización</span></h4>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" name="fecha_fin" value="<?php echo date('m/d/Y', strtotime($horario[0]->fecha_fin));?>" style="border-left: 0px; border-top: 0px; border-right: 0px;">
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="form-group">
            <?php echo form_error('hora'); ?>
              <div class="text-effect focus-t">
                  <h4><span>Hora</span></h4>
                  <input type="text" name="hora" id="t1" value="<?php echo date('h:i A', strtotime($horario[0]->hora));?>" class="form-control focus-text" data-format="hh:mm A" class="input-small">
              </div>    
          </div>
        </div>
    </div>
    


    <br>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        	<div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit" style="margin-top: 20px;">Editar</button>
          </div>
        </div>
    </div>
  </form>
</div>

