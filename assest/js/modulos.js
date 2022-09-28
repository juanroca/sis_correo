/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Casos
function MVerModulos(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CModulos/DetModulos/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

//Modal abrir el Modal Registro Casos
/*function MNuevoCasos(){    
    //window.open(host+"index.php/CCasos/FRegCasos/", "ventana1", "width=700,height=500", "scrollbars=yes");
    $(host+"index.php/CCasos/FRegCasos/");
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CCasos/FRegCasos/",
            data:obj,
            success:function(data){                
            }
        }
    )
}*/

//Registro Usurio nuevo
function RegModulo() {
    var formData = new FormData($('#FRegModulos')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "/RegistroModulos",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de actididad realizado existosamente');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }
        }
    )
}

//Modal Eliminar Casos
function MEliModulos(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CModulos/FEliModulos/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Funcion para eliminar Casos
function EliModulos(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CModulos/EliminarModulos/" + id,
            data: obj,
            success: function (data) {
                $("#respuesta_lg").html(data);
                setTimeout(
                    function () {
                        $('#modal-lg').modal('hide');
                    }, 200);

                setTimeout(
                    function () {
                        location.reload();
                    }, 500);
            }
        }
    )
}

//Modal formulario-lg Editar Casos
function MEditModulos(id) {
    $('#modal-xl').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CModulos/FEdiModulos/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-xl").html(data);
            }
        }
    )
}

//Función editar Casos
function EdiModulos(id) {
    var formData = new FormData($('#FEdiModulos')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CModulos/EdicionModulos/" + id,
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
                    }, 500);
            }
        }
    )
}

//Función Buscar Casos
function BuscarModulos() {
    var txt_busM = $("#table_searchModulos").val();
    var obj = {
        txt_busM: txt_busM
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CModulos/BuscarModulos",
        data: obj,
        success: function (data) {
            $('#resBusquedaModulos').html(data);
            //console.log(data);
        }
    })

}

//FUNCIÓN BUSCAR CONSULTA Casos
function BuscarCasosConsulta() {
    var txt_bus = $("#table_searchConsulta").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CCasosConsulta/BuscarCasos",
        data: obj,
        success: function (data) {
            $('#resBusquedaCasosConsulta').html(data);
            //console.log(data);
        }
    })
}

// VER DETALLLE Casos CONSULTA
function MVerCasosConsulta(id, situa) {

    
    //llamamos al Modal 
    $('#consul_modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CCasosConsulta/DetCasosConsulta/" + id+"/"+situa,
            data: obj,
            success: function (data) {
                $("#consul_formulario-lg").html(data);
                console.log(situa);
            }
        }
    )
}

function  MReporteCasos(id){
    window.open(host+"index.php/CCasos/ReporteCasos/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

function  MReporte(id){
    window.open(host+"index.php/CCasos/Reporte/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}



