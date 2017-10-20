'use strict';

$(document).ready(function(){
  $('.form-horizontal .waves-light').prop('disabled', true);
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {

          });

          $( "#btnBuscar" ).click(function() {
            // $.ajax({
            //   url : '/admin/habitacion/verifyDpi',
            //   dataType: "json",
            //   type:'get',
            //   data:{
            //     dpi:$("#dpi").val(),
            //
            //   }
            // }).success(
            //     function(res){
            //       console.log(res);
            //     }
            // ).error(
            //     function(){
            //       console.log('error');
            //     }
            // );

            $.ajax({
              dataType: "json",
              url: '/admin/habitacion/verifyDpi',
              data:{
                  dpi:$("#dpi").val(),
               },
              success: function (result) {
                  $.each(result.cliente,function(i, cliente){
                      console.log(cliente.nombre);
                  });
              },
              error: function(){
                  console.log("error");
              }
            });
          });///Fin function Click




});
