'use strict';

$(document).ready(function(){
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });
});
