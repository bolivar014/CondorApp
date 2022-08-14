$('#formCreateEmployee').on('submit', function(e) {
    e.preventDefault();
    // Recolectamos valores del formulario
    var selTipoDoc = $('#selTipoDoc').val();
    var txtNumDoc = $('#txtNumDoc').val();
    var txtName = $('#txtName').val();
    var txtLastname = $('#txtLastname').val();
    var txtDateBirth = $('#txtDateBirth').val();
    var selTipoDoc = $('#selTipoDoc').val();
    var _token = $("input[name=_token]").val();
    var action = document.getElementById('formCreateEmployee').action;
    
    // Ejecutamos ajax
    $.ajax({
        url: action,
        type: 'POST',
        data: {
            'selTipoDoc': selTipoDoc,
            'txtNumDoc': txtNumDoc,
            'txtName': txtName,
            'txtLastname': txtLastname,
            'txtDateBirth': txtDateBirth,
            'selTipoDoc': selTipoDoc,
            '_token': _token
        },
        dataType: 'json',
        success: function(response){
            // console.log('response - create employee');
            // console.log(response);

            // Validamos la ejecución
            if(response == "creado exitosamente") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se ha creado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })

                // Refrezcamos interfaz
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                // Error cuando no se crea el registro
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Se ha presentado un error al intentar crear el registro',
                })
            }
        },
        error: function(resp){
            // console.log('error - create employee');
            // console.log(resp.responseText);
        },
    })
});