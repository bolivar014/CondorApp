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
$('#close3, #close4').on('click', function(){
    $('#selTipoDocShow').val('');
    $('#txtNumDocShow').val('');
    $('#txtNameShow').val('');
    $('#txtLastnameShow').val('');
    $('#txtDateBirthShow').val('');
    $('#selTipoDepartamentShow').val('');
});

// Evento para la visualización de la información a editar
$('.editEmployee').click(function() {
    let id = $(this).attr("data-idEmployee");
    let URL = $(this).attr("data-empURL");
    var _token = $("input[name=_token]").val();
    $('#urlEditEmployee').val(URL);

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
            // console.log('success - edit Employee');
            // console.log(response);

            $('#selTipoDocEdit').val(response.type_doc);
            $('#txtNumDocEdit').val(response.num_doc);
            $('#txtNameEdit').val(response.name);
            $('#txtLastnameEdit').val(response.lastname);
            $('#txtDateBirthEdit').val(response.date_of_birth);
            $('#selTipoDepartamentEdit').val(response.departament_id);
        },
        error: function(resp) {
            // console.log('error - edit employee');
            // console.log(resp.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se ha presentado un error interno',
            })
        }
    })
});

// Evento para la actualización de empleados
$('#formEditEmployee').on('submit', function(e) {
    e.preventDefault();
    // Recolectamos valores del formulario
    var selTipoDocEdit = $('#selTipoDocEdit').val();
    var txtNumDocEdit = $('#txtNumDocEdit').val();
    var txtNameEdit = $('#txtNameEdit').val();
    var txtLastnameEdit = $('#txtLastnameEdit').val();
    var txtDateBirthEdit = $('#txtDateBirthEdit').val();
    var selTipoDepartamentEdit = $('#selTipoDepartamentEdit').val();
    var _token = $("input[name=_token]").val();
    var action = $('#urlEditEmployee').val();
    document.getElementById('formEditEmployee').action = action;
    // var action = document.getElementById('formEditEmployee').action;
    
    // Ejecutamos ajax
    $.ajax({
        url: action,
        type: 'PUT',
        data: {
            'selTipoDocEdit': selTipoDocEdit,
            'txtNumDocEdit': txtNumDocEdit,
            'txtNameEdit': txtNameEdit,
            'txtLastnameEdit': txtLastnameEdit,
            'txtDateBirthEdit': txtDateBirthEdit,
            'selTipoDepartamentEdit': selTipoDepartamentEdit,
            '_token': _token
        },
        dataType: 'json',
        success: function(response){
            // console.log('response - editt employee');
            // console.log(response);
            
            // Validamos la ejecución
            if(response == "Actualizado exitosamente") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se ha actualizado correctamente',
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
                    text: 'Se ha presentado un error al intentar actualizar el registro',
                })
            }
        },
        error: function(resp){
            // console.log('error - editt employee');
            // console.log(resp.responseText);

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se ha presentado un error interno',
            })
        },
    })
});

// Limpiamos campos de formulario editar
$('#close5, #close6').on('click', function() {
    $('select[name="selTipoDocEdit"]').prop('selectedIndex',0);
    $('#txtNumDocEdit').val('');
    $('#txtNameEdit').val('');
    $('#txtLastnameEdit').val('');
    $('#txtDateBirthEdit').val('');
    $('select[name="selTipoDepartamentEdit"]').prop('selectedIndex',0);
});