'use strict';

$(document).ready(function(){
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

    $('#createForm, #editForm').submit(function(e){
        e.preventDefault();
        var objForm=$(this), dataArray, url;

        if ( objForm.attr('id') == 'createForm' ) {
            dataArray = {
                dpi: $("#dpi").val()
            };
            url = '/admin/user/verifyCreate';
         }
    });


});
