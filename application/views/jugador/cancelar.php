<div class="col-sm-9">
    Cancelar curso
    <?php echo form_open('admin_cursos/matricular_cursos', array('method' => 'post')) ?>
    <table class="table table-hover" id="matricular_cursos">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nivel</th>
            <th>Horario</th>
            <th>Fecha de inicio</th>
            <th>Fecha de finalizacion</th>
            <th>Hora</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                    <?php foreach ($cursos as $curso) { ?>
                        <tr>
                            <td><?php echo $curso->codigo; ?></td>
                            <td><?php echo $curso->nivel; ?></td>
                            <td><?php if($curso->horarioObj) echo $curso->horarioObj->numero; ?></td>
                            <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_inicio; ?></td>
                            <td><?php if($curso->horarioObj) echo $curso->horarioObj->fecha_fin; ?></td>
                            <td><?php if($curso->horarioObj) echo $curso->horarioObj->hora; ?></td>
                            <td>
                                <a href="<?php echo base_url();?>index.php/admin_cursos/eliminar_matricula/<?php echo $curso->codigo; ?>/<?php echo $jugador->cedula; ?>"
                                   onclick="return confirmation()"
                                   class="btn btn-danger">Cancelar</a>
                            </td>
                        </tr>
                    <?php  } ?>
                </div>
            </div>
        </div>
        </tbody>
    </table>
    </form>
</div>

<script>
    function confirmation() {

        if(confirm("¿Desea eliminar eliminar el curso?"))

        {

            return true;

        }

        return false;

    }

</script>