function VerificarAdministrador(){

    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("Mensaje de advertencia" , "Llene los campos vacios", "warning")
    }

    alert("Has iniciado sesión ");
}