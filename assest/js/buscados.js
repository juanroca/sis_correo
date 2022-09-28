/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Perdes
function MVerBuscados(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/DetBuscados/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

// VER DETALLLE PERDES CONSULTA
function MVerBuscadosConsulta(id) {
    //llamamos al Modal 
    $('#consul_modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscadosConsulta/DetBuscadosConsulta/" + id,
            data: obj,
            success: function (data) {
                $("#consul_formulario-lg").html(data);
            }
        }
    )

}

//Registro Usurio nuevo
function RegBuscados() {
    var formData = new FormData($('#FRegBuscados')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "/RegistroBuscado",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de persona buscada realizado');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }
        }
    )
}

//Modal Eliminar Perdes
function MEliBuscados(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/FEliBuscados/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Funcion para eliminar Perdes
function EliBuscados(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/EliminarBuscados/" + id,
            data: obj,
            success: function (data) {
                $("#respuesta_lg").html(data);
                setTimeout(
                    function () {
                        $('#modal-lg').modal('hide');
                    }, 500);

                setTimeout(
                    function () {
                        location.reload();
                    }, 500);
            }
        }
    )
}

//Modal formulario-lg Editar Perdes
function MEditBuscados(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/FEdiBuscados/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Función editar Perdes
function EdiBuscados(id) {
    var formData = new FormData($('#FEdiBuscados')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/EdicionBuscados/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $('#mensaje-lg').html("<center class='alert alert-success' style='width:350px;'>Datos actualizados correctamente</center>");
                setTimeout(
                    function () {
                        $('#modal-lg').modal('hide');
                    }, 1000);

                setTimeout(
                    function () {
                        location.reload();
                    }, 500);
            }
        }
    )
}

//Función Buscar Perdes
function BBuscadosCompleto() {
    var txt_bus = $("#searchBuscados").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CBuscados/BuscarBuscadosCompleto",
        data: obj,
        success: function (data) {
            $('#resBusquedaBuscadosCompleto').html(data);
            //console.log(data);
        }
    })

}

//FUNCIÓN BUSCAR CONSULTA PERDES
function BuscarPerdesConsulta() {
    var txt_bus = $("#table_searchConsulta").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CPerdesConsulta/BuscarPerdes",
        data: obj,
        success: function (data) {
            $('#resBusquedaPerdesConsulta').html(data);
            //console.log(data);
        }
    })

}

function  MReportePerdes(id){
    window.open(host+"index.php/CPerdes/ReportePerdes/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

function  MReporte(id){
    window.open(host+"index.php/CPerdes/Reporte/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}



