<script type="text/javascript" src="../js/medico.js?rev<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO AL CONTENIDO DEL MEDICO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="fa fa-user-plus">Agregar usuario</i></button>
                </div>
            </div>
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Sexo</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Estado Civil</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Medicamento</th>
                  <th>Indicaciones</th>
                  <th>Acci&oacute;n</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Sexo</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Estado Civil</th>
                  <th>Ciudad</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Medicamento</th>
                  <th>Indicaciones</th>
                  <th>Acci&oacute;n</th>
                </tr>
              </tfoot>
            </table>
        
            </div>
            <!-- /.box-body -->

    </div>
          <!-- /.box -->
</div>
<div class="modal fade" id="modal_registro" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro de paciente</h4>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">
              <label for="">Usuario del paciente:</label>
              <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Rol:</label>
              <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">

              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Nombre:</label>
              <input type="text" class="form-control" id="txt_nom" placeholder="Ingrese nombre"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Apellido:</label>
              <input type="text" class="form-control" id="txt_ape" placeholder="Ingrese apellido"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese contrase&ntilde;a"><br>
          </div>
          
          <div class="col-lg-12">
              <label for="">Repita la contrase&ntilde;a:</label>
              <input type="password" class="form-control" id="txt_con2" placeholder="Repita la contrase&ntilde;a"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Sexo:</label>
              <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                <option value="M">MASCULINO</option>
                <option value="F">FEMENINO</option>
              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Cédula:</label>
              <input type="text" class="form-control" id="txt_ced" placeholder="Ingrese su cédula"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Email:</label>
              <input type="text" class="form-control" id="txt_mail" placeholder="Ingrese su correo electrónico"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Estado civil:</label>
              <select class="js-example-basic-single" name="state" id="cbm_estado" style="width:100%;">
                <option value="C">CASADO</option>
                <option value="S">SOLTERO</option>
              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Ciudad:</label>
              <input type="text" class="form-control" id="txt_ciu" placeholder="Ingrese su Ciudad"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Dirección:</label>
              <input type="text" class="form-control" id="txt_dir" placeholder="Ingrese su dirección"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Telefono:</label>
              <input type="text" class="form-control" id="txt_telf" placeholder="Ingrese su número de telefono"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Medicamento:</label>
              <input type="text" class="form-control" id="txt_med" placeholder="Ingrese medicamento"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Indicaciones:</label>
              <input type="text" class="form-control" id="txt_ind" placeholder="Ingrese las indicaciones respectivas"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" onclick="Registrar_Usuario()">Registar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modal_editar" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar datos del paciente</h4>
        </div>
        <div class="modal-body">
          <div class="col-lg-12">
            <input type="text" id="txtidusuario" hidden>
              <label for="">Usuario del paciente:</label>
              <input type="text" class="form-control" id="txtusu_editar" placeholder="Ingrese paciente" disabled><br>
          </div>
          <div class="col-lg-12">
              <label for="">Rol:</label>
              <select class="js-example-basic-single" name="state" id="cbm_rol_editar" style="width:100%;">
              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Nombre:</label>
              <input type="text" class="form-control" id="txtnom_editar" placeholder="Ingrese nombre"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Apellido:</label>
              <input type="text" class="form-control" id="txtape_editar" placeholder="Ingrese apellido"><br>
          </div>
          
          <div class="col-lg-12">
              <label for="">Sexo:</label>
              <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                <option value="M">MASCULINO</option>
                <option value="F">FEMENINO</option>
              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Cédula:</label>
              <input type="text" class="form-control" id="txtced_editar" placeholder="Ingrese su cédula"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Email:</label>
              <input type="text" class="form-control" id="txtmail_editar" placeholder="Ingrese su correo electrónico"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Estado civil:</label>
              <select class="js-example-basic-single" name="state" id="cbm_estado_editar" style="width:100%;">
                <option value="C">CASADO</option>
                <option value="S">SOLTERO</option>
              </select><br><br>
          </div>
          <div class="col-lg-12">
              <label for="">Ciudad:</label>
              <input type="text" class="form-control" id="txtciu_editar" placeholder="Ingrese su Ciudad"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Dirección:</label>
              <input type="text" class="form-control" id="txtdir_editar" placeholder="Ingrese su dirección"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Telefono:</label>
              <input type="text" class="form-control" id="txttelf_editar" placeholder="Ingrese su número de telefono"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Medicamento:</label>
              <input type="text" class="form-control" id="txtmed_editar" placeholder="Ingrese medicamento"><br>
          </div>
          <div class="col-lg-12">
              <label for="">Indicaciones:</label>
              <input type="text" class="form-control" id="txtind_editar" placeholder="Ingrese las indicaciones respectivas"><br>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" onclick="Modificar_Usuario()">Editar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>
$(document).ready(function() {
    listar_paciente();
    $('.js-example-basic-single').select2();
    listar_combo_rol_paciente();
    $("#modal_registro").on('shown.bs.modal', function(){
        $("#txt_usu").focus();

    })
});
</script>