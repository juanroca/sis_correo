/*Función Extraer el path de la baseURL */
function getAbsolutePath(){
    var loc=window.location;
    var pathName= loc.pathname.substring(0, loc.pathname.lastIndexOf('/')+1);
    return loc.href.substring(0, loc.href.length -((loc.pathname + loc.search +loc.hash).length-pathName.length));
}
var host=getAbsolutePath(); 

//Funcion para ver datos del usuario en el modal
function MVerUsuario(id){
    //llamamos al Modal 
    $('#modal-df').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/DetUsuario/"+id,
            data:obj,
            success:function(data){
                $("#formulario-df").html(data);
            }
        }
    )

}

//funcion abrir el Modal Registro Usuario
/*function MNuevoUsuario(){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/FRegUsuario",
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
}*/
//Registro Usurio nuevo
function RegUsuario(){
    var pass=document.getElementById("password").value; //extraemos el dato de password
    var pass2=document.getElementById("password2").value; //extraemos el dato de password2
    var formData=new FormData($('#FRegUsuario')[0]);
    if(pass==pass2){
    $.ajax(
        {
            type:"POST",
            url:host+"RegistroUsuario",
            data:formData,
            cache:false,//Si se establece en falso, obligará a que el navegador no almacene en caché las páginas
            contentType:false,//tipo de datos que estas enviando, poner false para que no establezca el tipo de datos por default
            processData:false, //pasa los datos como objeto, si se envia un DOM, se debe establecer en false
            complete : function(data) {
                setTimeout(
                    function () {
                        alert('USUARIO REGISTRADO CORRECTAMENTE..!!');
                    });
                setTimeout(
                    function () {
                        location.href ="./";
                    }, 500);
            },
            error:function(){

            }            
        }
        )
    } else{
        alert("Las contraseñas no coinciden!!!");
    }
}

//Modal Eliminar Usuario
function MEliUsuario(id){
    $('#modal-df').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/FEliUsuario/"+id,
            data:obj,
            success:function(data){
                $("#formulario-df").html(data);
            }
        }
    )
} 

//Funcion para eliminar usuario
function EliUsuario(id){
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/EliminarUsuario/"+id,
            data:obj,
            success:function(data){
                alert('USUARIO ELIMINADO CORRECTAMENTE..!!');
                setTimeout(
                    function(){
                        $('#modal-df').modal('hide');
                    },100);

                setTimeout(
                    function(){
                        location.reload();
                    },500);
            }
        }
    )
}

//Modal Formulario Editar Usuario
function MEditUsuario(id){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/FEdiUsaurio/"+id,
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
}

//Función editar usuario
function EditUsuario(id){
    var formData=new FormData($('#FEditUsuario')[0]);
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CUsuario/EdicionUsuario/"+id,
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(){
                alert('DATOS DEL USUARIO ACTUALIZADOS CORRECTAMENTE...!!!');
                setTimeout(
                    function(){
                        $('#modal-lg').modal('hide');
                    },100);

                setTimeout(
                    function(){
                        location.reload();
                    },500);
                }
        }
        )
}
//Función Buscar Usuario
function BuscarUsuario(){
    var txt_bus=$("#usuario_search").val();
    var obj={
        txt_bus:txt_bus
    };
    $.ajax({
        type:"POST",
        url:host+"index.php/CUsuario/BusUsuario",
        data:obj,
        success:function(data){
            $('#resBusqueda').html(data);
            //console.log(data);
        }
    })
    
}
