// Evento para la creación de empleados
$('#formCreateEmployee').on('submit', function(e) {
    e.preventDefault();
    // Recolectamos valores del formulario
    var selTipoDoc = $('#selTipoDoc').val();
    var txtNumDoc = $('#txtNumDoc').val();
    var txtName = $('#txtName').val();
    var txtLastname = $('#txtLastname').val();
    var txtDateBirth = $('#txtDateBirth').val();
    var selTipoDepartament = $('#selTipoDepartament').val();
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
            'selTipoDepartament': selTipoDepartament,
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
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se ha presentado un error interno',
            })
        },
    })
});

// Evento para limpiar modal - Crear empleados
$('#close2, #close').on('click', function(){
    // $('#selTipoDoc').val('').trigger('change');
    $('select[name="selTipoDoc"]').prop('selectedIndex',0);
    $('#txtNumDoc').val('');
    $('#txtName').val('');
    $('#txtLastname').val('');
    $('#txtDateBirth').val('');
    // $('#selTipoDepartament').val('').trigger('change');
    $('select[name="selTipoDepartament"]').prop('selectedIndex',0);
});

// Obtenemos dataid para generar consulta para extraer datos
$(".detail").click(function(){
    // Recupero dataid a consultar
    let id = $(this).attr("data-idEmployee");
    let URL = $(this).attr("data-empURL");
    var _token = $("input[name=_token]").val();
    
    // Ejecutamos ajax
    $.ajax({
        url: URL,
        type: 'GET',
        data: {
            'id': id,
            '_token': _token
        },
        dataType: 'json',
        success: function(response) {
            // console.log('success - show Employee');
            // console.log(response);

            $('#selTipoDocShow').val(response.type_doc);
            $('#txtNumDocShow').val(response.num_doc);
            $('#txtNameShow').val(response.name);
            $('#txtLastnameShow').val(response.lastname);
            $('#txtDateBirthShow').val(response.date_of_birth);
            $('#selTipoDepartamentShow').val(response.departament_id);
        },
        error: function(resp) {
            // console.log('error - show employee');
            // console.log(resp.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se ha presentado un error interno',
            })
        }
    })
});

// Limpiamos campos del formulario
$('#close3, $close4').on('click', function(){
    $('#selTipoDocShow').val('');
    $('#txtNumDocShow').val('');
    $('#txtNameShow').val('');
    $('#txtLastnameShow').val('');
    $('#txtDateBirthShow').val('');
    $('#selTipoDepartamentShow').val('');
});