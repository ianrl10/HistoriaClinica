// función verificar paciente
function VerificarPacienteUsuario(){

    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning")
    }
    $.ajax({
        url:'../controlador/paciente/verificar_paciente_usuario.php',
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
function listar_paciente_usuario(){
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
           "url":"../controlador/paciente/listar_paciente_usuario.php",
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




function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
