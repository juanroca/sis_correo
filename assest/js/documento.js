/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Documento en el modal
function MVerDocumento(id) {
    //llamamos al Modal 
    $('#modal-df').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/DetDocumento/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )

}

//funcion abrir el Modal Registro Documento
/*function MNuevoDocumento(){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDocumento/FRegDocumento",
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
}*/
//Registro DOCUMENTO nuevo
function RegDocumento() {
    var formData = new FormData($('#FRegDocumento')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "RegistroDocumento",
            data: formData,
            cache: false,//Si se establece en falso, obligará a que el navegador no almacene en caché las páginas
            contentType: false,//tipo de datos que estas enviando, poner false para que no establezca el tipo de datos por default
            processData: false, //pasa los datos como objeto, si se envia un DOM, se debe establecer en false
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de Documento realizado correctamenten!!!');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }            
        }
    )
}

//Modal Eliminar Documento
function MEliDocumento(id) {
    $('#modal-df').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/FEliDocumento/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )
}

//Funcion para eliminar Documento
function EliDocumento(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/EliminarDocumento/" + id,
            data: obj,
            success: function (data) {
                alert('DOCUMENTO ELIMINADO CORRECTAMENTE..!!');
                setTimeout(
                    function () {
                        $('#modal-df').modal('hide');
                    }, 100);

                setTimeout(
                    function () {
                        location.reload();
                    }, 500);
            }
        }
    )
}

//Modal Formulario Editar Documento
function MEditDocumento(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/FEdiDocumento/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Función editar Documento
function EditDocumento(id) {
    var formData = new FormData($('#FEditDocumento')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/EdicionDocumento/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                alert('DATOS DEL DOCUMENTO ACTUALIZADOS CORRECTAMENTE...!!!');
                setTimeout(
                    function () {
                        $('#modal-lg').modal('hide');
                    }, 100);

                setTimeout(
                    function () {
                        location.reload();
                    }, 500);
            }
        }
    )
}
//Modal para formulario de OFICIAR DOCUMENTO
function MOficiarDoc(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CDocumento/FEdiDocumento/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}
