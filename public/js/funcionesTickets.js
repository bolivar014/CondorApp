// alert('llego');
// Eventos de iteracción selector tipo de gestión
$('#tipo_gestion').on('change', function(e) {
    // debugger;
    let valTipoGestion = e.target.value;


});

// Evento para cambio de departamento
$('#departamento').on('change', function() {
    // Reseteamos campos
    $("#id_agente_gestion").val("").trigger( "change" );
    $('#txtEmailAgente').val('');

});

// Eventos con el selector agente gestiona
$('#id_agente_gestion').on('change', function(){
    // Reseteamos campos
    $('#txtEmailAgente').val('');
});

//
$('#selAreaTip').on('change', function() {
    $('#selTipificacion').val("").trigger("change");
});
