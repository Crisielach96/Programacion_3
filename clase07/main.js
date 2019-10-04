"use strict";
/// <reference path="node_modules/@types/jquery/index.d.ts" />
function SubirFoto() {
    var pagina = "subirImagen.php";
    if ($("#archivo").val() === "") {
        return;
    }
    $("#fotoTmp").attr("src", "");
    $("#lblFoto").html("");
    AdministrarGif(true);
    var archivo = document.getElementById("archivo");
    var formData = new FormData();
    formData.append("archivo", archivo.files[0]);
    formData.append("caso", "1");
    $.ajax({
        type: 'POST',
        url: pagina,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        async: true
    })
        .done(function (objJson) {
        AdministrarGif(false);
        if (!objJson.Exito) {
            console.clear();
            console.log(objJson.Mensaje);
            return;
        }
        $("#fotoTmp").attr("src", objJson.PathTemporal);
        $("#hdnFotoSubir").val(objJson.PathTemporal);
        $("#lblFoto").html("Nombre de la imagen: " + objJson.NombreFoto);
    })
        .fail(function (jqXHR, textStatus, errorThrown) {
        AdministrarGif(false);
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}
function AdministrarGif(mostrar) {
    var gif = "css/gif-load.gif";
    var div = $("#divGif"); //<HTMLDivElement> document.getElementById("divGif");
    var img = $("#imgGif"); //<HTMLImageElement> document.getElementById("imgGif");
    if (mostrar) {
        div.css("display", "block"); //div.style.display = "block";
        div.css("top", "50%"); //div.style.top = "50%";
        div.css("left", "45%"); //div.style.left = "45%"
        img.attr("src", gif); //img.src = gif;
    }
    else {
        div.css("display", "block"); //div.style.display = "none";
        img.attr("src", ""); //img.src = "";
    }
}
//# sourceMappingURL=main.js.map