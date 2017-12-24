'use strict';

$(document).ready(function(){
    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

    $( "#txtValor" ).keypress(function() {
        var valor2=$( "#txtValor" ).val()
        var valor=150-valor2
        console.log(valor);
      });

});
