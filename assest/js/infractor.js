/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//REGISTRO NUEVO INFRACTOR
function RegInfractor() {
    var formData = new FormData($('#FRegInfractor')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "/RegistroInfractor",
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

//Funcion para ver datos del Infractor
function MVerInfractor(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CInfractor/DetInfractor/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

//Modal formulario-lg Editar Infractor
function MEditInfractor(id) {
    $('#modal-xl').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CInfractor/FEditarInfractor/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-xl").html(data);
            }
        }
    )
}


//Función editar INFRACTOR
function EdiInfractor(id) {
    var formData = new FormData($('#FEdiInfractor')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CInfractor/EditarInfractor/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $('#mensaje-xl').html("<center class='alert alert-success' style='width:350px;'>Datos actualizados correctamente</center>");
                setTimeout(
                    function () {
                        $('#modal-xl').modal('hide');
                    }, 500);

                setTimeout(
                    function () {
                        location.reload();
                    }, 100);
            }
        }
    )
}

function  MPrintInfractor(id){
    window.open(host+"index.php/CInfractor/PrintInfractor/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

//MODAL ELIMINAR INFRACTOR
function MEliInfractor(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CInfractor/FEliInfractor/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}
//Funcion para eliminar INFRACTOR
function EliInfractor(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CInfractor/EliminarInfractor/" + id,
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

//FUNCION BUSCAR INFRACTOR
function BuscarInfractor() {
    var txt_bus = $("#table_searchInfractor").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CInfractor/BuscarInfractor",
        data: obj,
        success: function (data) {
            $('#resBusInfractor').html(data);
            //console.log(data);
        }
    })

}

