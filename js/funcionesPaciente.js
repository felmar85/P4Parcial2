var dt;

function paciente(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fpaciente").serialize();
         $.ajax({
            type:"get",
            url:"./php/pacientes/controladorPaciente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Pacientes");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#paciente").removeClass("hide");
                $("#paciente").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar la paciente con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/pacientes/controladorPaciente.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La paciente con codigo : ' + codigo + ' fue borrada',
                                'success'
                            )     
                            dt.ajax.reload();     //actualiza la data table                        
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado Pacientes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#paciente").removeClass("hide");
        $("#paciente").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Paciente");
        $("#nuevo-editar" ).load("./php/pacientes/nuevoPaciente.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#paciente").removeClass("show");
        $("#paciente").addClass("hide");
         $.ajax({
             type:"get",
             url:"./php/pacientes/controladorPaciente.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {   
              //console.log(resultado.data)  
              //MONTA LOS OPTIONS DEL SELECT DEL paciente         
 /*              $("#id_paciente option").remove()       
              $("#id_paciente").append("<option selecte value=''>Seleccione un Paciente</option>")
              $.each(resultado.data, function (index, value) { //recorre resultado.data
                $("#id_paciente").append("<option value='" 
                + value.id_paciente + "'>"
                + value.documento + "</option>") 
              });*/
           });
    })

    $("#contenido").on("click","button#grabar",function(){
        /*var comu_codi = $("#comu_codi").attr("value");
        var nombre = $("#nombre").attr("value");
        var id_paciente = $("#id_paciente").attr("value");
        var datos = "comu_codi="+comu_codi+"&nombre="+nombre+"&id_paciente="+id_paciente;*/
      
      var datos=$("#fpaciente").serialize();//formulario de nueva paciente id=fpaciente
       $.ajax({
            type:"get",
            url:"./php/pacientes/controladorPaciente.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado pacientes");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#paciente").removeClass("hide");
                $("#paciente").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    });


    $("#contenido").on("click","a.editar",function(){
       $("#titulo").html("Editar paciente");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       
        $("#nuevo-editar").load("./php/pacientes/editarPaciente.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#paciente").removeClass("show");
        $("#paciente").addClass("hide");
       $.ajax({
           type:"get",
           url:"./php/pacientes/controladorPaciente.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( paciente ) {        
                if(paciente.respuesta === "no existe"){
                    swal({
                      type: 'error',
                      title: 'Oops...',
                      text: 'paciente no existe!!!!!'                         
                    })
                } else {
                    $("#id_paciente").val(paciente.codigo);                   
                    $("#nombre").val(paciente.nombre);
                    $("#documento").val(paciente.documento);
                    $("#telefono").val(paciente.telefono);
                    $("#correo").val(paciente.correo);
                    $("#estado").val(paciente.estado);
                    paciente = paciente.paciente;
                }
           });

/*            $.ajax({
             type:"get",
             url:"./php/pacientes/controladorPaciente.php",
             data: {accion:'listar'},
             dataType:"json"
           }).done(function( resultado ) {                     
              $("#id_paciente option").remove();
              $.each(resultado.data, function (index, value) { 
                
              if(paciente === value.id_paciente){
                  $("#id_paciente").append("<option selected value='" + value.id_paciente + "'>" + value.documento + "</option>")
                }else {
                  $("#id_paciente").append("<option value='" + value.id_paciente + "'>" + value.documento + "</option>")
                } 
              });
           }); */    
            
       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de pacientes");
  dt = $("#tabla").DataTable({
        "ajax": "php/pacientes/controladorPaciente.php?accion=listar",
        "columns": [
            { "data": "id_paciente"} ,
            { "data": "nombre" },
            { "data": "documento" },
            { "data": "telefono" },
            { "data": "correo" },
            { "data": "estado" },
            { "data": "id_paciente",
            //botones de editar y borrar 
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_paciente",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  paciente();
});