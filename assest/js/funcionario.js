/*Función Extraer el path de la baseURL */
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host = getAbsolutePath();

//Funcion para ver datos del Funcionario en el modal
function MVerFuncionario(id) {
    //llamamos al Modal 
    $('#modal-df').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CFuncionario/DetFuncionario/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )

}

//funcion abrir el Modal Registro Funcionario
/*function MNuevoFuncionario(){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CFuncionario/FRegFuncionario",
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
}*/
//Registro Usurio nuevo
function RegFuncionario() {
    var formData = new FormData($('#FRegFuncionario')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "RegistroFuncionario",
            data: formData,
            cache: false,//Si se establece en falso, obligará a que el navegador no almacene en caché las páginas
            contentType: false,//tipo de datos que estas enviando, poner false para que no establezca el tipo de datos por default
            processData: false, //pasa los datos como objeto, si se envia un DOM, se debe establecer en false
            complete : function(data) {                
                setTimeout(
                    function () {
                        alert('Registro de Funcionario realizado correctamenten!!!');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);            
            }            
        }
    )
}

//Modal Eliminar Funcionario
function MEliFuncionario(id) {
    $('#modal-df').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CFuncionario/FEliFuncionario/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-df").html(data);
            }
        }
    )
}

//Funcion para eliminar Funcionario
function EliFuncionario(id) {
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CFuncionario/EliminarFuncionario/" + id,
            data: obj,
            success: function (data) {
                alert('FUNCIONARIO ELIMINADO CORRECTAMENTE..!!');
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

//Modal Formulario Editar Funcionario
function MEditFuncionario(id) {
    $('#modal-lg').modal('show');
    var obj = "";
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CFuncionario/FEdiFuncionario/" + id,
            data: obj,
            success: function (data) {
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Función editar Funcionario
function EditFuncionario(id) {
    var formData = new FormData($('#FEditFuncionario')[0]);
    $.ajax(
        {
            type: "POST",
            url: host + "index.php/CFuncionario/EdicionFuncionario/" + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                alert('DATOS DEL FUNCIONARIO ACTUALIZADOS CORRECTAMENTE...!!!');
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
//Función Buscar Funcionario
function BuscarFuncionario() {
    var txt_bus = $("#Funcionario_search").val();
    var obj = {
        txt_bus: txt_bus
    };
    $.ajax({
        type: "POST",
        url: host + "index.php/CFuncionario/BusFuncionario",
        data: obj,
        success: function (data) {
            $('#resBusqueda').html(data);
            //console.log(data);
        }
    })

}
