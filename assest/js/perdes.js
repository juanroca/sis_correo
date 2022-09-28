/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Perdes
function MVerPerdes(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdes/DetallePerdes/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

function MVerBuscados(id) {
    //llamamos al Modal 
    $('#modal-sm').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CBuscados/DetBuscados/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-sm").html(data);
            }
        }
    )

}

//Modal abrir el Modal Registro Perdes
/*function MNuevoPerdes(){    
    //window.open(host+"index.php/CPerdes/FRegPerdes/", "ventana1", "width=700,height=500", "scrollbars=yes");
    $(host+"index.php/CPerdes/FRegPerdes/");
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CPerdes/FRegPerdes/",
            data:obj,
            success:function(data){                
            }
        }
    )
}*/

//Registro Usurio nuevo
function RegPerdes() {
    var formData = new FormData($('#FRegTrata')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "/RegistroPerdes",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de personas desaparecida realizado');
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
function MEliPerdes(id) {
    $('#modal-sm').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdes/FEliminarPerdes/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-sm").html(data);
            }
        }
    )
}

//Funcion para eliminar Perdes
function EliPerdes(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdes/EliminarPerdes/" + id,
            data: obj,
            success: function (data) {
                $("#respuesta_sm").html(data);
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
function MEditPerdes(id) {
    $('#modal-xl').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdes/FEdicionPerdes/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-xl").html(data);
            }
        }
    )
}

//Función editar Perdes
function EdiPerdes(id) {
    var formData = new FormData($('#FEdiTrata')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdes/EdicionPerdes/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $('#mensaje-xl').html("<center class='alert alert-success' style='width:350px;'>Datos actualizados correctamente</center>");
                setTimeout(
                    function () {
                        $('#modal-xl').modal('hide');
                    }, 1000);

                setTimeout(
                    function () {
                        location.reload();
                    }, 1000);
            }
        }
    )
}

//Función Buscar Perdes
function BuscarPerdesCompleto() {
    var txt_bus = $("#table_search").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CPerdes/BuscarPerdesCompleto",
        data: obj,
        success: function (data) {
            $('#resBusquedaPerdesCompleto').html(data);
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

// VER DETALLLE PERDES CONSULTA
function MVerPerdesConsulta(id, situa) {

    
    //llamamos al Modal 
    $('#consul_modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CPerdesConsulta/DetPerdesConsulta/" + id+"/"+situa,
            data: obj,
            success: function (data) {
                $("#consul_formulario-lg").html(data);
                console.log(situa);
            }
        }
    )
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



