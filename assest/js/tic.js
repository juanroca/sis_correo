/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//REGISTRO NUEVO TIC
function RegTic() {
    var formData = new FormData($('#FRegTic')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "RegistroTic",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de conductor realizado');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }
        }
    )
}

//Funcion para ver datos del Tic
function MVerTic(id) {
    //llamamos al Modal 
    $('#modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CTic/DetTic/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )

}

//Modal formulario-lg Editar Tic
function MEditTic(id) {
    $('#modal-xl').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CTic/FEditarTic/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-xl").html(data);
            }
        }
    )
}


//Función editar TIC
function EditarTic(id) {
    var formData = new FormData($('#FEdiTic')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CTic/EditarTic/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $('#mensaje-xl').html("<center class='alert alert-success' style='width:250px;'>Datos actualizados correctamente</center>");
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

//MODAL IMPRIMIR TIC
function  MPrintTic(id){
    window.open(host+"index.php/CTic/PrintTic/"+id, '_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

//MODAL ELIMINAR TIC
function MEliTic(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CTic/FEliTic/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}
//FUNCION PARA ELIMINAR TIC
function EliTic(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CTic/EliminarTic/" + id,
            data: obj,
            success: function (data) {
                $("#respuesta_lg").html(data);
                setTimeout(
                    function () {
                        $('#modal-lg').modal('hide');
                    }, 800);

                setTimeout(
                    function () {
                        location.reload();
                    }, 800);
            }
        }
    )
}

