'use strict';

$(document).ready(function () {

    $("#signin-form_id").parsley();

    $("#signin-form_id").submit(function (e) {
        e.preventDefault();
        $("#signin-form_id .btn-pink.btn-block").prop('disabled', true);

        $.Notification.notify('black','top rigth', 'Cargando!', 'Espere por favor.');
        
        var objForm = $(this), dataArray = {
            user: $("#user").val(),
            password: $("#password").val()
        };

        var verification_data = new AjaxRequest( dataArray, '/auth/verify', $('#token').val() );
        
        verification_data.sending(function ( responseError ) {
            if ( responseError ) {
                $.Notification.notify('error','top rigth', 'Error', 'Usuario o contraseña incorrecta.');
                $("#signin-form_id .btn-pink.btn-block").prop('disabled', false);
            } else objForm.unbind('submit').submit();
        });
    });

});