'use strict';
String.prototype.trim = function() { return this.replace(" ", ''); };
$(document).ready(function(){
  var des = $("#description").val();
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
                      description:$("#description").val().trim()
                  };
                  url = '/admin/shifts/verifycreate';
              } else {
                  dataArray = {
                      dpi: $("#dpi").val(),
                      id: $("#id").val()
                  };
                  url = '/admin/shifts/verifyedit';
              }

              var verification_data = new AjaxRequest( dataArray, url, $('#token').val() );

              verification_data.sending(function ( responseError ) {
                  if ( responseError ) {
                      $.Notification.notify('error','top rigth', 'Error', 'Este Turno ya Existe.');
                      $(".form-horizontal .waves-light").prop('disabled', false);
                  } else
                      objForm.unbind('submit').submit();
              });
          });


});
