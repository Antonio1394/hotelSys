'use strict';

$(document).ready(function(){
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

          $('#createForm, #editForm').submit(function(e) {
              e.preventDefault();
              var objForm = $(this), dataArray, url;

              if ( objForm.attr('id') == 'createForm' ) {
                  dataArray = {
                      user: $("#user").val()
                  };
                  url = '/admin/users/verifycreate';
              } else {
                  dataArray = {
                      dpi: $("#dpi").val(),
                      id: $("#id").val()
                  };
                  url = '/admin/agents/verifyedit';
              }

              var verification_data = new AjaxRequest( dataArray, url, $('#token').val() );

              verification_data.sending(function ( responseError ) {
                  if ( responseError ) {
                      $.Notification.notify('error','top rigth', 'Error', 'Usuario existente.');
                      $(".form-horizontal .waves-light").prop('disabled', false);
                  } else
                      objForm.unbind('submit').submit();
              });
          });


});
