"use strict";
/// <reference path = "node_modules/@types/jquery/index.d.ts"/>
function mostrarMensaje() {
    var mensaje = $('#mensaje').val();
    $("#div_mensaje").html(mensaje);
    $.ajax({
        type: 'post',
        url: 'test.php',
        data: 'mensaje=' + $('#mensaje').val(),
        dataType: 'json'
    })
        .done(function (obj) {
        console.log(obj);
        alert("Exito");
    })
        .fail(function (obj) {
        alert("Error");
    });
}
//# sourceMappingURL=ejemplo.js.map