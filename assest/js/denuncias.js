/*Función Extraer el path de la baseURL */
function getAbsolutePath(){
    var loc=window.location;
    var pathName= loc.pathname.substring(0, loc.pathname.lastIndexOf('/')+1);
    return loc.href.substring(0, loc.href.length -((loc.pathname + loc.search +loc.hash).length-pathName.length));
}
var host=getAbsolutePath(); 

//Modal abrir el Modal Registro Denuncias
function MNuevoDenuncias(){
    $('#modal-xl').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/FormRegDenuncias",
            data:obj,
            success:function(data){
                $("#formulario-xl").html(data);
            }
        }
    )
}
/*
//Registro Nueva Denuncias
function RegNDenuncia(){
    var formData=new FormData($('#FRegNDenuncias')[0]);
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CNuevaD/RegistroNDenuncias",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){
                $('host+"index.php/CNuevaD');

            },
            error: function() {
                alert('Error occured');
            }
        }
        )    
}*/

//Registro Usurio nuevo
function RegDenuncia(){
    var formData=new FormData($('#FRegDenuncias')[0]);
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/RegistroDenuncias",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data){
                $('#mensaje-xl').html("<center class='alert alert-success' style='width:350px;'>Nueva denuncia registrada..!!</center>");                
                setTimeout(
                    function(){
                        $('#modal-xl').modal('hide');
                    },1000);

                setTimeout(
                    function(){
                        location.reload();
                    },1000);                
                }
        }
        )    
}

function  MReporteDenuncias(id){
    window.open(host+"index.php/CDenuncias/ReporteDenuncias/"+id,'_blank');
    //window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=400, height=400");
    var obj="";      
}

function MVerDenuncias(id){
    //llamamos al Modal 
    $('#modal-xl').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/DetDenuncias/"+id,
            data:obj,
            success:function(data){
                $("#formulario-xl").html(data);
            }
        }
    )

}
/*
// VER DETALLLE Denuncias CONSULTA
function MVerDenunciasConsulta(id){
    //llamamos al Modal 
    $('#consul_modal-lg').modal('show');

    //Hacemos la petición al servidor para ver los datos
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenunciasConsulta/DetDenunciasConsulta/"+id,
            data:obj,
            success:function(data){
                $("#consul_formulario-lg").html(data);
            }
        }
    )

}*/


//Modal Eliminar Denuncias
function MEliDenuncias(id){
    $('#modal-lg').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/FEliminarDenuncias/"+id,
            data:obj,
            success:function(data){
                $("#formulario-lg").html(data);
            }
        }
    )
} 

//Funcion para eliminar Denuncias
function EliDenuncias(id){
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/EliminarDenuncias/"+id,
            data:obj,
            success:function(data){
                $("#respuesta_lg").html(data);
                setTimeout(
                    function(){
                        $('#modal-lg').modal('hide');
                    },1000);

                setTimeout(
                    function(){
                        location.reload();
                    },500);
            }
        }
    )
}

//Modal formulario-lg Editar Denuncias
function MEditDenuncias(id){
    $('#modal-xl').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/FEdicionDenuncias/"+id,
            data:obj,
            success:function(data){
                $("#formulario-xl").html(data);
                //console.log(data);
            }
        }
    )
}

//Función editar Denuncias
function EditDenuncias(id){
    var formData=new FormData($('#FEdiDenuncias')[0]);
    $.ajax(
        {
            type:"POST",
            url:host+"index.php/CDenuncias/EdicionDenuncias/"+id,
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(){
                $('#mensaje-xl').html("<center class='alert alert-success' style='width:350px;'>Datos actualizados correctamente</center>");
                setTimeout(
                    function(){
                        $('#modal-xl').modal('hide');
                    },1000);

                setTimeout(
                    function(){
                        location.reload();
                    },1000);
                }
        }
        )
}

//Función Buscar Denuncias
function BuscarDenuncias(){
    var txt_bus=$("#table_search").val();
    var obj={
        txt_bus:txt_bus
    };
    $.ajax({
        type:"POST",
        url:host+"index.php/CDenuncias/BuscarDenuncias",
        data:obj,
        success:function(data){
            $('#resBusquedaDenuncias').html(data);
            //console.log(data);
        }
    })
    
}

//FUNCIÓN BUSCAR CONSULTA Denuncias
function BuscarDenunciasConsulta(){
    var txt_bus=$("#table_searchConsulta").val();
    var obj={
        txt_bus:txt_bus
    };
    $.ajax({
        type:"POST",
        url:host+"index.php/CDenunciasConsulta/BuscarDenuncias",
        data:obj,
        success:function(data){
            $('#resBusquedaDenunciasConsulta').html(data);
            //console.log(data);
        }
    })
    
}


