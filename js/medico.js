// función verificar paciente
function VerificarPaciente(){

    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning")
    }
    $.ajax({
        url:'../controlador/medico/verificar_paciente.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
        if(resp==0){
            Swal.fire("Mensaje De Error" , 'Usuario y/o contrase\u00f1a incorrecta', "error");
        }else{
            var data=JSON.parse(resp);
            
            } 
            // sweet alert como ventana de alerta al inicio de sesión   
            $.ajax({
                url:'../controlador/administrador/crear_sesion.php',
                type:'POST',
                data:{
                    idusuario:data [0][0],
                    user:data [0][3],
                    rol: data [0][2]
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'Bienvenido al sistema',
                html: 'seras redireccionado en <b></b> unos segundos.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {

                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
})
            

        })

    

    })
}
var table;
function listar_paciente(){
    table = $('#tabla_usuario').DataTable({
       "ordering":false,
       "paging": false,
       "searching": { "regex": true },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/medico/paciente_listar.php",
           type:'POST'
       },
       "columns":[
           {"data":"posicion"},
           {"data":"nombre_usuario"},
           {"data":"nombre_rol"},
           {"data":"apellido_usuario"},
           {"data":"sexo_usuario",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "MASCULINO";                 
                    }else{
                        return "FEMENINO";  
                    }                   
              }
             
           },
           {"data":"cedula_usuario"}, 
           {"data":"email"}, 
           {"data":"estado_civil",
                render: function (data, type, row ) {
                    if(data=='C'){
                        return "CASADO";                 
                    }else{
                        return "SOLTERO";  
                    }                   
              }
             
           },
           {"data":"ciudad"}, 
           {"data":"direccion"}, 
           {"data":"telefono"}, 
           {"data":"receta"}, 
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button><button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash'></i></button>"}
       ],

       "language": idioma_espanol,
       select: true
   });

   $('input.global_filter').on( 'keyup click', function () {
    filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

}


$('#tabla_usuario').on('click','.editar', function(){
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({backdrop:'static',keyboard:false})
    $("#modal_editar").modal('show');
    $("#txtidusuario").val(data.id_usuario);
    $("#txtusu_editar").val(data.nombre_usuario);
    $("#cbm_rol_editar").val(data.id_rol).trigger("change");
    $("#txtape_editar").val(data.apellido_usuario);
    $("#cbm_sexo_editar").val(data.sexo_usuario).trigger("change");
    $("#txtced_editar").val(data.cedula_usuario);
    $("#txtmail_editar").val(data.email);
    $("#cbm_estado_editar").val(data.estado_civil).trigger("change");
    $("#txtciu_editar").val(data.ciudad);
    $("#txtdir_editar").val(data.direccion);
    $("#txttelf_editar").val(data.telefono);
    $("#txtreceta_receta").val(data.receta);


})


function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro(){
    $("#modal_registro").modal('show');
}

function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/administrador/combo_rol_listar.php",
           type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>" +data[i][1]+ "</option>";
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }else{    
            cadena+="option value=''> NO SE ENCONTRARON REGISTROS </option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
            
        }    
    })
}


function Registrar_Paciente(){
    var usu = $("#txt_usu").val();
    var rol = $("#cbm_rol").val();
    var ape = $("#txt_ape").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var cedula = $("#txt_ced").val();
    var email = $("#txt_mail").val();
    var estado = $("#cbm_estado").val();
    var ciudad = $("#txt_ciu").val();
    var dir = $("#txt_dir").val();
    var telf = $("#txt_telf").val();
    var receta = $("#txt_receta").val();
    
    if(usu.length==0 || rol.length==0 || ape.length==0|| contra.length==0 || contra2.length==0 
        || sexo.length==0 || cedula.length==0 || email.length==0 || estado.length==0 
        || ciudad.length==0 || dir.length==0 || telf.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning");
    }
    
    if(contra != contra2){
        return Swal.fire("Mensaje de advertencia" , "Las contraseñas no coinciden", "warning");
    }

    $.ajax({
        "url":"../controlador/administrador/usuario_registro.php",
        type:'POST',
        data:{
            usuario:usu,
            rol:rol,
            apellido:ape,
            contrasena:contra,
            sexo:sexo,
            cedula:cedula,
            email:email,
            estado:estado,
            ciudad:ciudad,
            direccion:dir,
            telefono:telf,
            receta:receta

        }
    }).done(function(resp){
        if(resp>0){
            if(resp==1){
                $("#modal_registro").modal('hide');
                Swal.fire("Nuevo Registro","Datos correctos","success")
                .then ( ( value ) => {
                    LimpiarRegistro();
                    table.ajax.reload();

                });
            }else{
                return Swal.fire("El usuario ya se encuntra registrado" , "Advertencia", "warning");

            }

        }else{
            Swal.fire("Mensaje de De Error","No se pudo completar el registro","error");
        }
    
    })

}


function Modificar_Paciente(){
    var idusuario = $("#txtidusuario").val();
    var rol = $("#cbm_rol_editar").val();
    var ape = $("#txtape_editar").val();
    var sexo = $("#cbm_sexo_editar").val();
    var cedula = $("#txtced_editar").val();
    var email = $("#txtmail_editar").val();
    var estado = $("#cbm_estado_editar").val();
    var ciudad = $("#txtciu_editar").val();
    var dir = $("#txtdir_editar").val();
    var telf = $("#txttelf_editar").val();
    var receta = $("#txtreceta_editar").val();
    
    if(idusuario.length==0 || rol.length==0 || ape.length==0 || sexo.length==0 || cedula.length==0 
        || email.length==0 || estado.length==0   || ciudad.length==0 || dir.length==0 
        || telf.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning");
    }


    $.ajax({
        "url":"../controlador/administrador/usuario_modificar.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            rol:rol,
            apellido:ape,
            sexo:sexo,
            cedula:cedula,
            email:email,
            estado:estado,
            ciudad:ciudad,
            direccion:dir,
            telefono:telf,
            receta:receta

        }
    }).done(function(resp){
        if(resp>0){
                $("#modal_editar").modal('hide');
                Swal.fire("Datos modificados","Mensaje De Confirmacion","success")
                .then ( ( value ) => {
                    table.ajax.reload();

                });

        }else{
            Swal.fire("Mensaje de De Error","No se pudo modificar los datos","error");
        }
    
    })

}

function LimpiarRegistro(){
    $("#txt_usu").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");


}