/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

function BuscadosConsultas() {
    var txt_bus = $("#searchConsultas").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CConsultas/BuscarConsultas",
        data: obj,
        success: function (data) {
            $('#resConsulta').html(data);
            //console.log(data);
        }
    })

}

function MVerConsultas(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConsultas/DetConsultas/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}



