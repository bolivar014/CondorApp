// Evento para la creación de un nuevo departamento
$('#formCreateDepartament').on('submit', function(e) {
    e.preventDefault();

    // Recolectamos valores del formulario
    var txtNameDepartament = $('#txtNameDepartament').val();
    var _token = $("input[name=_token]").val();
    var action = document.getElementById('formCreateDepartament').action;

    // Ejecutamos ajax
    $.ajax({
        url: action,
        type: 'POST',
        data: {
            'txtNameDepartament': txtNameDepartament,
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

// Limpiamos campos del formulario
$('#close7, #close8').on('click', function(){
    $('#txtNameDepartament').val('');
});

// Evento para abrir el visualizador de edición
$('.editDepartament').click(function() {
    let id = $(this).attr("data-idDepartament");
    let URL = $(this).attr("data-empURL");
    var _token = $("input[name=_token]").val();
    $('#urlEditDepartament').val(URL);

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
            // console.log('success - edit departament');
            // console.log(response);

            $('#txtNameDepartamentEdit').val(response.departament);
        },
        error: function(resp) {
            // console.log('error - edit departament');
            // console.log(resp.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se ha presentado un error interno',
            })
        }
    })
});

// 
$('#formEditDepartament').on('submit', function(e) {
    e.preventDefault();
    // Recolectamos valores del formulario
    var txtNameDepartamentEdit = $('#txtNameDepartamentEdit').val();
    var _token = $("input[name=_token]").val();
    var action = $('#urlEditDepartament').val();
    
    // Ejecutamos ajax
    $.ajax({
        url: action,
        type: 'PUT',
        data: {
            'txtNameDepartamentEdit': txtNameDepartamentEdit,
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