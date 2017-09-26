var longitude;
var latitude;
var token;
var html= '<form action="/admin/mapsAlert" method="post">'
          +'<input type=hidden name="_token" id="idtoken">'
          +'<div class="container">'
          +'<h5 class="alert alert-info">Alertas General</h5>'
            +'<div class="row">'
            +'<div class="col-xs-12">'
              +'<label>Descripcion de la alerta</label>'
              +'<textarea name="description" rows="4" cols="50" class="form-control" required></textarea>'
              +'</div>'
          +'</div>'

          +'<div class="row">'
              +'<div class="col-xs-12">'
                +'<label>Dirección</label>'
                +'<input name="address" type="textarea" class="form-control" required>'
              +'</div>'
          +'</div>'

          +'<div class="row">'
            +'<div class="col-xs-6">'
              +'<input name="latitude" type="hidden" class="form-control" id="txtlat" required>'
            +'</div>'
            +'<div class="col-xs-6">'
              +'<input name="longitude" type="hidden" class="form-control" id="txtLng" required>'
            +'</div>'
          +'</div>'
          +'<hr>'
          +'<button type="submit" id="btnSend" class="btn btn-danger">Enviar</button>'
          +'</div>'
          +'</form>';
var htmlCar= '<form action="/admin/mapsAlert/SaveAlertCar" method="post">'
          +'<input type=hidden name="_token" id="idtoken">'
          +'<div class="container">'
            +'<h5 class="alert alert-warning">Alertas Carro</h5>'
          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<label>Tipo de Alerta</label>'
              +'<select name="type" class="form-control" required>'
                +'<option value="">Seleccione Una opción</option>'
                +'<option value="Motocicleta">Motocicleta</option>'
                +'<option value="Sedán">Sedán</option>'
                +'<option value="Pick Up">Pick Up</option>'
                +'<option value="Camioneta">Camioneta</option>'
                +'<option value="Moto Taxi">Moto Taxi</option>'
                +'<option value="Camionetilla">Camionetillai</option>'
                +'<option value="Camión">Camión</option>'
                +'<option value="Bus">Bus</option>'
                +'<option value="Otro">Otro</option>'
              +'</select>'
            +'</div>'
            +'<div class="col-xs-4">'
                +'<label>Dirección</label>'
                +'<input name="address" class="form-control" required>'
              +'</div>'
              +'<div class="col-xs-4">'
                  +'<label>Marca del Vehiculo</label>'
                  +'<input name="brand" class="form-control" required>'
                +'</div>'
          +'</div>'



          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<label>Color</label>'
              +'<input name="color" type="text" class="form-control" required>'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<label>Placa</label>'
              +'<input name="plate" type="text" class="form-control">'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<label>Denunciante</label>'
              +'<input name="person" type="text" class="form-control" required>'
            +'</div>'
          +'</div>'

          +'<label>Tipo</label>'
          +'<br>'
            +  '<label class="radio-inline"><input type="radio" value="Hurto" name="mode" required>Hurto</label>'
            +  '<label class="radio-inline"><input type="radio" value="Robo" name="mode" required>Robo</label>'


          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<input name="latitude" type="hidden" class="form-control" id="txtlat" required>'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<input name="longitude" type="hidden" class="form-control" id="txtLng" required>'
            +'</div>'
          +'</div>'
          +'<hr>'
          +'<button type="submit" id="btnSend" class="btn btn-danger">Enviar</button>'
          +'</div>'
          +'</form>';
var htmlDeath= '<form action="/admin/mapsAlert/saveAlertDeath" method="post">'
          +'<input type=hidden name="_token" id="idtoken">'
          +'<div class="container">'
            +'<h5 class="alert alert-danger">Alertas Muertos/Heridos</h5>'
          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<label>Tipo</label>'
              +'<select name="personType" class="form-control" required>'
                +'<option value="">Seleccione Una opción</option>'
                +'<option value="PNC">PNC</option>'
                +'<option value="Civil">Civil</option>'
              +'</select>'
            +'</div>'
            +'<div class="col-xs-4">'
                +'<label>Dirección</label>'
                +'<input name="address" class="form-control" required>'
              +'</div>'
              +'<div class="col-xs-4">'
                  +'<label>Cantidad</label>'
                  +'<input type="number" name="quantity" class="form-control" required>'
                +'</div>'
          +'</div>'



          +'<div class="row">'
            +'<div class="col-xs-4">'
            +'<label>Tipo de Alerta</label>'
            +'<select name="alertType" class="form-control" required>'
              +'<option value="">Seleccione Una opción</option>'
              +'<option value="Fallecido">Fallecido</option>'
              +'<option value="Herido">Herido</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-xs-8">'
              +'<label>Causa</label>'
              +'<input name="cause" type="text" class="form-control">'
            +'</div>'
          +'</div>'


          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<input type="hidden" name="latitude" class="form-control" id="txtlat" required>'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<input type="hidden" name="longitude"  class="form-control" id="txtLng" required>'
            +'</div>'
          +'</div>'
          +'<hr>'
          +'<button type="submit" id="btnSend" class="btn btn-danger">Enviar</button>'
          +'</div>'
          +'</form>';
var htmlStole= '<form action="/admin/mapsAlert/SaveAlertStole" method="post">'
          +'<input type=hidden name="_token" id="idtoken">'
          +'<div class="container">'
            +'<h5 class="alert alert-success">Alertas Robo General</h5>'

          +'<div class="row">'
              +'<div class="col-xs-6">'
                +'<label>Robo a</label>'
                +'<input name="robbery" class="form-control" required>'
              +'</div>'
              +'<div class="col-xs-6">'
                +'<label>Dirección</label>'
                +'<input name="address" class="form-control" required>'
              +'</div>'
          +'</div>'


          +'<div class="row">'
            +'<div class="col-xs-6">'
              +'<label>Descripción del Individuo</label>'
              +'<textarea name="individual"  class="form-control"  rows="3" cols="80" required ></textarea>'
            +'</div>'
            +'<div class="col-xs-6">'
              +'<label>Descripción del Objeto Robado</label>'
              +'<textarea name="object"  class="form-control"  rows="3" cols="80" required ></textarea>'
            +'</div>'
          +'</div>'

          +'<div class="row">'
            +'<div class="col-xs-12">'
              +'<label>Denunciante</label>'
              +'<input type="text" name="person"  class="form-control" required >'
            +'</div>'
          +'</div>'



          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<input name="latitude" type="hidden" class="form-control" id="txtlat" required>'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<input name="longitude" type="hidden" class="form-control" id="txtLng" required>'
            +'</div>'
          +'</div>'
          +'<hr>'
          +'<button type="submit" id="btnSend" class="btn btn-danger">Enviar</button>'
          +'</div>'
          +'</form>';
var html52= '<form action="/admin/mapsAlert/SaveAlert52" method="post">'
          +'<input type=hidden name="_token" id="idtoken">'
          +'<div class="container">'
            +'<h5 class="alert alert-danger">Alertas 5-2</h5>'
          +'<div class="row">'
            +'<div class="col-xs-12">'
              +'<label>Motivo de la Alerta</label>'
              +'<textarea name="description"  class="form-control"  rows="3" cols="80" required ></textarea>'
            +'</div>'
          +'</div>'

          +'<div class="row">'
            +'<div class="col-xs-4">'
              +'<input name="latitude" type="hidden" class="form-control" id="txtlat" required>'
            +'</div>'
            +'<div class="col-xs-4">'
              +'<input name="longitude" type="hidden" class="form-control" id="txtLng" required>'
            +'</div>'
          +'</div>'
          +'<hr>'
          +'<button type="submit" id="btnSend" class="btn btn-danger">Enviar</button>'
          +'</div>'
          +'</form>';


$(document).ready(function(){
  var image = {
      url: '/station.png',
      size: new google.maps.Size(70, 65),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(0, 32)
    };
    /*Genero el mapa en el documento*/
  map=new GMaps({
    div:'#map',
    lat:14.539809,
    lng:-91.678978,
    zoom:14,
  });

/*Inicio del boton de ALerta General*/
  $("#btnAlert").click(function(){
    $('#btnAlert').attr("disabled", true);
    var marker = map.addMarker({
      lat:14.533157027842934,
      lng:-91.68154120445251,
      draggable: true,
      click: function(position) {
        token=$("#token").val();
        latitude=position.position.lat();
        longitude=position.position.lng();
        setTimeout(function(){
          document.getElementById('txtlat').value = latitude;
          document.getElementById('txtLng').value=longitude;
          document.getElementById('idtoken').value=token;
        }, 1000);
      },
      dragend: function(position) {
        console.log(position);
          token=$("#token").val();
          latitude=position.latLng.lat();
          longitude=position.latLng.lng();
          $("#txtlat").val(latitude);
          $("#txtLng").val(longitude);
          $("#idtoken").val(token);
        },
        infoWindow:{
            content: html,
        }
    });/*Fin del Marcador*/
  });/*Fin del boton ALerta general*/
  /*Inicio del boton de ALerta Vehiculo*/
  $("#btnAlertCar").click(function(){
      $('#btnAlertCar').attr("disabled", true);
      var marker = map.addMarker({
        lat:14.539809,
        lng:-91.678978,
        draggable: true,
        icon:'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        click: function(position) {
          token=$("#token").val();
          latitude=position.position.lat();
          longitude=position.position.lng();
          setTimeout(function(){
            document.getElementById('txtlat').value = latitude;
            document.getElementById('txtLng').value=longitude;
            document.getElementById('idtoken').value=token;
          }, 1000);
        },
        dragend: function(position) {
          console.log(position);
            token=$("#token").val();
            latitude=position.latLng.lat();
            longitude=position.latLng.lng();
            $("#txtlat").val(latitude);
            $("#txtLng").val(longitude);
            $("#idtoken").val(token);
          },
          infoWindow:{
              content: htmlCar
          }
      });/*Fin del Marcador*/
    });/*Fin del boton ALerta Vehiculo*/
  /*incio de alerta de robo*/
  $("#btnAlertStole").click(function(){
      $('#btnAlertStole').attr("disabled", true);
      var marker = map.addMarker({
        lat:14.539809,
        lng:-91.678978,
        draggable: true,
        icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        click: function(position) {
          token=$("#token").val();
          latitude=position.position.lat();
          longitude=position.position.lng();
          setTimeout(function(){
            document.getElementById('txtlat').value = latitude;
            document.getElementById('txtLng').value=longitude;
            document.getElementById('idtoken').value=token;
          }, 1000);
        },
        dragend: function(position) {
          console.log(position);
            token=$("#token").val();
            latitude=position.latLng.lat();
            longitude=position.latLng.lng();
            $("#txtlat").val(latitude);
            $("#txtLng").val(longitude);
            $("#idtoken").val(token);
          },
          infoWindow:{
              content: htmlStole
          }
      });/*Fin del Marcador*/
    });/*Fin del boton ALerta Vehiculo*/
  /*Inicio de alerta 5-2*/
  $("#btnAlert52").click(function(){
      $('#btnAlert52').attr("disabled", true);
      var marker = map.addMarker({
        lat:14.539809,
        lng:-91.678978,
        draggable: true,
        click: function(position) {
          token=$("#token").val();
          latitude=position.position.lat();
          longitude=position.position.lng();
          setTimeout(function(){
            document.getElementById('txtlat').value = latitude;
            document.getElementById('txtLng').value=longitude;
            document.getElementById('idtoken').value=token;
          }, 1000);
        },
        dragend: function(position) {
          console.log(position);
            token=$("#token").val();
            latitude=position.latLng.lat();
            longitude=position.latLng.lng();
            $("#txtlat").val(latitude);
            $("#txtLng").val(longitude);
            $("#idtoken").val(token);
          },
          infoWindow:{
              content: html52
          }
      });/*Fin del Marcador*/
    });/*Fin del boton ALerta Vehiculo*/
  /*Fin inicio alerta 5-2*/

  /*Inicio de Alerta de Robo y Fallecido*/
  $("#btnAlertDeath").click(function(){
      $('#btnAlertDeath').attr("disabled", true);
      var marker = map.addMarker({
        lat:14.539809,
        lng:-91.678978,
        draggable: true,
        click: function(position) {
          token=$("#token").val();
          latitude=position.position.lat();
          longitude=position.position.lng();
          setTimeout(function(){
            document.getElementById('txtlat').value = latitude;
            document.getElementById('txtLng').value=longitude;
            document.getElementById('idtoken').value=token;
          }, 1000);
        },
        dragend: function(position) {
          console.log(position);
            token=$("#token").val();
            latitude=position.latLng.lat();
            longitude=position.latLng.lng();
            $("#txtlat").val(latitude);
            $("#txtLng").val(longitude);
            $("#idtoken").val(token);
          },
          infoWindow:{
              content: htmlDeath
          }
      });/*Fin del Marcador*/
    });/*Fin del boton ALerta Vehiculo*/
  /*Fin de Alerta de herido y Fallecido*/


});/*Fin del docuemnto general*/
