'use strict';

$(document).ready(function(){
  $('.form-horizontal .waves-light').prop('disabled', true);
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {

          });

          $( "#btnBuscar" ).click(function() {
            var dpi=document.getElementById("idDpi").value;
            if ($('#idDpi').val().length == 0){
              swal ({
                 title: "Error",
                 text: "El campo esta vacio, intente de nuevo",
                 type: "error",
                 showConfirmButton: true,
                 animation:true,
                 background: 'red',
               });
            }else{
              $.ajax({
                  dataType: "json",
                  url: '/admin/habitacion/verifyDpi',
                  data:{
                    dpi:dpi
                  },

                success: function (result) {
                    $.each(result.cliente,function(i, cliente){
                        console.log(cliente.nombre);
                    });
                },
                error: function(){
                    console.log("error");
                }
              });///FIn del Ajax
            }///Fin del Else
          });///Fin function Click




});
