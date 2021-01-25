<script type="text/javascript" src="../js/paciente.js?rev<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO AL CONTENIDO DEL PACIENTE</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Apellido</th>
                  <th>Sexo</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Estado Civil</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Receta</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Apellido</th>
                  <th>Sexo</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Estado Civil</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Receta</th>
                </tr>
              </tfoot>
            </table>
        
            </div>
            <!-- /.box-body -->

    </div>
          <!-- /.box -->
</div>


<script>
$(document).ready(function() {
    listar_paciente();
    $('.js-example-basic-single').select2();
    listar_combo_rol();
    $("#modal_registro").on('shown.bs.modal', function(){
        $("#txt_usu").focus();

    })
});
</script>