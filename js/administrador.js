// función verificar usuario administrador
function VerificarAdministrador(){

    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning")
    }
    $.ajax({
        url:'../controlador/administrador/verificar_administrador.php',
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
                    user:data [0][1],
                    rol: data [0][4]
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