'use strict';

$(document).ready(function(){

    $("#image").change(function(e) {
        $("#textImage").val($(this).val().replace(/.*(\/|\\)/, ''));
    });

    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

    $('#createForm, #editForm').submit(function(e) {
        e.preventDefault();
        var objForm = $(this), dataArray, url;

        if ( objForm.attr('id') == 'createForm' ) {/*Formulario de Guardar*/
            dataArray = {
                dpi: $("#dpi").val()
            };
              /*Array para NIP*/
              var dataArray2={
                nip:$("#nip").val()
              }
              /*AJAX para NIP*/
              var verification_data2 = new AjaxRequest( dataArray2,'/admin/agents/verifyNip', $('#token').val() );
              url = '/admin/agents/verifycreate';
              var verification_data = new AjaxRequest( dataArray, url, $('#token').val() );
              verification_data.sending(function ( responseError ) {
                if ( responseError ) {
                    $.Notification.notify('error','top rigth', 'Error', 'este DPI ya existe. No se puede duplicar');
                    $(".form-horizontal .waves-light").prop('disabled', false);
                } else {
                  verification_data2.sending(function ( responseError ) {
                    if ( responseError ) {
                        $.Notification.notify('error','top rigth', 'Error', 'este NIP ya existe. No se puede duplicar');
                        $(".form-horizontal .waves-light").prop('disabled', false);
                    } else objForm.unbind('submit').submit();
                });
                }
            });
        } else {
            dataArray = {
                dpi: $("#dpi").val(),
                id: $("#id").val()
            };
            url = '/admin/agents/verifyedit';
            var verification_data = new AjaxRequest( dataArray, url, $('#token').val() );
            var dataArray3={
              nip:$("#nip").val(),
              id: $("#id").val()
            }
            /*AJAX para Editar NIP*/
            var verification_data3 = new AjaxRequest( dataArray3,'/admin/agents/verifyeditNip', $('#token').val() );
            verification_data3.sending(function ( responseError ) {
                if ( responseError ) {
                    $.Notification.notify('error','top rigth', 'Error', 'este NIP ya existe. No se puede duplicar');
                    $(".form-horizontal .waves-light").prop('disabled', false);
                }else{
                  verification_data.sending(function ( responseError ) {
                      if ( responseError ) {
                          $.Notification.notify('error','top rigth', 'Error', 'este DPI ya existe. No se puede duplicar');
                          $(".form-horizontal .waves-light").prop('disabled', false);
                      } else objForm.unbind('submit').submit();

                  });
                }
            });
        }
        /*Fin del Else*/
    });
});



(function() {
    window.Parsley.addValidator('formatimage', function (val, req) {
        var extensiones = val.substring(val.lastIndexOf("."));
        var extension = extensiones.toLowerCase();

        if( extension != ".jpg" && extension != ".png" && extension != ".jpeg")
        return false;
        else
        return true;
    }, 32)
    .addMessage('en', 'formatimage', 'Tipo de archivo incorrecto.');

    window.Parsley.addValidator('sizeimage', function (val, req) {
        var sizeByte = document.getElementById("image").files[0].size;
        sizeByte = parseInt(sizeByte);

        if( sizeByte > 250000 )
        return false;
        else
        return true;

    }, 32)
    .addMessage('en', 'sizeimage', 'La imagen no puede exeder los 250kb.');
})();
