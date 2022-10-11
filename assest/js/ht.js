/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Ht en el modal
function MVerHt(id) {
    //llamamos al Modal 
    $('#modal-df').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CHt/DetHt/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )

}

//funcion abrir el Modal Registro Ht
function MNuevoHt(id_doc){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CHt/FRegHt/"+id_doc,
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
}
//Registro Usurio nuevo
function RegHt() {
    var formData = new FormData($('#FRegHt')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "RegistroHt",
            data: formData,
            cache: false,//Si se establece en falso, obligará a que el navegador no almacene en caché las páginas
            contentType: false,//tipo de datos que estas enviando, poner false para que no establezca el tipo de datos por default
            processData: false, //pasa los datos como objeto, si se envia un DOM, se debe establecer en false
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de Ht realizado correctamenten!!!');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }            
        }
    )
}

//Modal Eliminar Ht
function MEliHt(id) {
    $('#modal-df').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CHt/FEliHt/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )
}

//Funcion para eliminar Ht
function EliHt(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CHt/EliminarHt/" + id,
            data: obj,
            success: function (data) {
                alert('Ht ELIMINADO CORRECTAMENTE..!!');
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

//Modal Formulario Editar Ht
function MEditHt(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CHt/FEdiHt/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Función editar Ht
function EditHt(id) {
    var formData = new FormData($('#FEditHt')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CHt/EdicionHt/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                alert('DATOS DEL Ht ACTUALIZADOS CORRECTAMENTE...!!!');
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
//Función Buscar Ht
function BuscarHt() {
    var txt_bus = $("#Ht_search").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CHt/BusHt",
        data: obj,
        success: function (data) {
            $('#resBusqueda').html(data);
            //console.log(data);
        }
    })

}
