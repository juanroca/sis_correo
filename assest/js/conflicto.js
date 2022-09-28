/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Conflicto
function MVerConflicto(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "/CConflicto/DetConflicto/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

//Modal abrir el Modal Registro Conflicto
/*function MNuevoConflicto(){    
    //window.open(host+"index.php/CConflicto/FRegConflicto/", "ventana1", "width=700,height=500", "scrollbars=yes");
    //$(host+"index.php/CConflicto/FRegConflicto/");
    $('#modal-xl').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CConflicto/FRegConflicto/",
            data:obj,
            success:function(data){   
                $("#formulario-xl").html(data);                 
            }
        }
    )
}*/

//Registro Usurio nuevo
function RegConflicto() {
    var formData = new FormData($('#FRegConflicto')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "RegistroConflicto",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de caso realizado');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }
        }
    )
}

//Modal Eliminar Conflicto
function MEliConflicto(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConflicto/FEliConflicto/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Funcion para eliminar Conflicto
function EliConflicto(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConflicto/EliminarConflicto/" + id,
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

//Modal formulario-lg Editar Conflicto
function MEditConflicto(id) {
    $('#modal-xl').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConflicto/FEdiConflicto/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-xl").html(data);
            }
        }
    )
}

//Función editar Conflicto
function EdiConflicto(id) {
    var formData = new FormData($('#FEdiConflicto')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConflicto/EdicionConflicto/" + id,
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

//Función Buscar Conflicto
function BuscarConflicto() {
    var txt_bus = $("#table_searchConflicto").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CConflicto/BuscarConflicto",
        data: obj,
        success: function (data) {
            $('#resBusquedaConflicto').html(data);
            //console.log(data);
        }
    })

}

//FUNCIÓN BUSCAR CONSULTA Conflicto
function BuscarConflictoConsulta() {
    var txt_bus = $("#table_searchConsulta").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CConflictoConsulta/BuscarConflicto",
        data: obj,
        success: function (data) {
            $('#resBusquedaConflictoConsulta').html(data);
            //console.log(data);
        }
    })
}

// VER DETALLLE Conflicto CONSULTA
function MVerConflictoConsulta(id, situa) {

    
    //llamamos al Modal 
    $('#consul_modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CConflictoConsulta/DetConflictoConsulta/" + id+"/"+situa,
            data: obj,
            success: function (data) {
                $("#consul_formulario-lg").html(data);
                console.log(situa);
            }
        }
    )
}

function  MReporteConflicto(id){
    window.open(host+"index.php/CConflicto/ReporteConflicto/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

//MODAL REPORTE
function MRepConflicto() {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CExcel/FElegirUnidad",
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}