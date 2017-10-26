'use strict';

$(document).ready(function(){
  $('.form-horizontal .waves-light').prop('disabled', true);
  $('#IdInformation').hide();
  $('#IdInformationCliente').hide();


  $('#idDpi').click(function(){
    $('#IdInformation').hide('slow');
  });

    $('#createForm, #editForm')
        .parsley()
        .on('form:submit', function() {
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
                success: function (result) {
                    $.each(result.cliente,function(i, cliente){
                        $('#IdInformation').show('slow');
                        $("#idNombre").text(cliente.nombre+" "+cliente.apellido);
                        $("#idTel").text(cliente.telefono);
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
                      $('.form-horizontal .waves-light').prop('disabled', false);
                      $('#btnBuscar').prop('disabled', true);

                  })
                }
              });///FIn del Ajax
            }///Fin del Else
          });///Fin function Click




});
