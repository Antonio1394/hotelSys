'use strict';

$(document).ready(function(){
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

    $('#createForm, #editForm').submit(function(e){
        e.preventDefault();
        var objForm=$(this), dataArray, url, url2;
        if ( objForm.attr('id') == 'createForm' ) {
            dataArray = {
                dpi: $("#dpi").val(),
                nit:$("#idNit").val(),
            };
            url = '/admin/cliente/verifyDpi';
            url2= '/admin/cliente/verifyNit'
         }else{
           dataArray = {
               id: $('#id').val(),
               dpi:$("#dpi").val(),
               nit:$("#idNit").val(),
            };





            url = '/admin/cliente/verifyDpiEdit';
            url2= '/admin/cliente/verifyNitEdit'
         }
         var verification_data = new AjaxRequest( dataArray, url, $('#token').val() );
         var verification_data2 = new AjaxRequest( dataArray, url2 , $('#token').val() );
         verification_data.sending(function ( responseError ) {
             if ( responseError ) {
               swal ({
                  title: "Error",
                  text: "El DPI ya existe",
                  type: "error",
                  showConfirmButton: true,
                  animation:true,
                 background: '#ff0000',
                });
                 $(".form-horizontal .waves-light").prop('disabled', false);
             } else{///Fin del if para verficar DPI
                 verification_data2.sending(function ( responseError ) {
                     if ( responseError ) {
                       swal ({
                          title: "Error",
                          text: "El NIT ya existe",
                          type: "error",
                          showConfirmButton: true,
                          animation:true,
                         background: '#ff0000',
                        });
                         $(".form-horizontal .waves-light").prop('disabled', false);
                    }
                  else objForm.unbind('submit').submit();
               });///Fin de la segunda verificacion de AJAX
             }///fin de segundo else
          });///Fin de la primera evrificacion de AJAX
        });////Fin de la funcion Submit
});
