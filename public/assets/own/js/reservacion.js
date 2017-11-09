'use strict';

$(document).ready(function(){
  $('.form-horizontal .waves-light').prop('disabled', true);//Bloquea boton de crear
  $('#IdInformation').hide();
  $('#IdInformationCliente').hide();
  $('#IdInformationReservation').hide();
  $('#idDpi').click(function(){
    $('#IdInformation').hide('slow');
    $('#IdInformationReservation').hide('slow');
  });

    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
            $('.form-horizontal .waves-light').prop('disabled', true);
          });

          $( "#btnBuscar" ).click(function() {
            var dpiData=document.getElementById("idDpi").value;
            if ($('#idDpi').val().length == 0){
              swal ({
                 title: "Error",
                 text: "El campo esta vacio, intente de nuevo",
                 type: "error",
                 showConfirmButton: true,
                 animation:true,
               });
            }else{
              $.ajax({
                  dataType: "json",
                  url: '/admin/habitacion/verifyDpi/'+dpiData,
                  dataArray:{
                    dpi:dpiData
                  },
                success: function (result) {///Si el cliente existe
                    $.each(result.cliente,function(i, cliente){
                        $('#IdInformation').show('slow');
                        $('#IdInformationReservation').show('slow');
                        $("#idNombre").text(cliente.nombre+" "+cliente.apellido);
                        $("#idTel").text(cliente.telefono);
                        $("#idCliente").text(cliente.id);
                        $('.form-horizontal .waves-light').prop('disabled', false);//Bloquea boton de crear
                    });
                },
                error: function(){
                  swal({
                    title: 'El cliente no esta registrado',
                    text: "Desea Registrarlo?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Registrar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: true
                  }).then(function () {//// Si presiona ok
                      $('#IdInformationCliente').show('slow');
                      $('#idInformationDpi').hide('slow');
                      $('#IdInformationReservation').show('slow');
                      $('.form-horizontal .waves-light').prop('disabled', false);
                      $('#btnBuscar').prop('disabled', true);

                  })
                }
              });///FIn del Ajax
            }///Fin del Else
          });///Fin function Click




});
