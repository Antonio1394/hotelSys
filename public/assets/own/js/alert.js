'use strict'
var lati;
var longi;

$(document).ready(function(){

  $('#createForm')
      .parsley()
      .on('form:submit', function() {
          $('.form-horizontal .waves-light').prop('disabled', true);
        });

  $('#createForm').submit(function(e) {
      e.preventDefault();
      GMaps.geolocate({
        success: function(position) {
        //map.setCenter(position.coords.latitude, position.coords.longitude);
        lati=position.coords.latitude;
        longi=position.coords.longitude;
      },
      error: function(error) {
        alert('Geolocation failed: '+error.message);
      },
      not_supported: function() {
        alert("Your browser does not support geolocation");
      },
      always: function() {

          /*Inico Ajax para enviar los Datos*/
          var dataArray = {
              description: $("#description").val(),
              address:     $("#address").val(),
              latitude:    lati,
              longitude:   longi,
          };
          var verification_data = new AjaxRequest( dataArray, '/user/alerts/save', $('#token').val() );
          swal({
           title: "Espere por favor....",
           text: "Se estan obteniendo los datos de Ubicación?",
           type: "info",
           showCancelButton: false,
           closeOnConfirm: false,
           showConfirmButton: false,
           showLoaderOnConfirm: false,
         });
          verification_data.sending(function ( responseError ) {
              if ( responseError ) {
                  swal("Oops", "We couldn't connect to the server!", "error");
                  $("#signin-form_id .btn-pink.btn-block").prop('disabled', false);
              } else   {
                swal("Correcto!", "Se Genero la Alerta correctamente", "success");
                $('#modal-maintenances').modal('hide');
              }
          });
        }/*Fin de la funcion always*/
      });/*Fin de la funcion geolocalizacion*/
  });


});/*Fin del Documento*/
