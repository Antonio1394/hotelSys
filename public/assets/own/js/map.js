'use strict'

google.maps.event.addDomListener(window,'load',initMap);
var mapa;
var marcador_tiempo_real;
var central={lat:14.539809, lng:-91.678978};
var markerAlert=[];
var markerCar=[];
var markerStole=[];
var marker52=[];
var markerDeath=[];
var infowindow = [];
var infowindowAlert =[];
var infowindowCar=[];
var infowindowStole=[];
var infowindow52=[];
var image = {
    url: '/station.png',
    size: new google.maps.Size(70, 65),
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(0, 32)
  };
var imageAlert={
  url: '/imgMarker2.png',
  size: new google.maps.Size(70, 65),
  origin: new google.maps.Point(0, 0),
  anchor: new google.maps.Point(0, 32)
};


/*funicon que carga el mapa dentro de la pagina*/
function initMap() {
  var beaches;
  $.get("/admin/getUbication", function( data ) {
      beaches = data;
      console.log(beaches);
      var opcionesMapa = {
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var mapa = new google.maps.Map(document.getElementById('map'),opcionesMapa);
        navigator.geolocation.getCurrentPosition(function(posicion){
          var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
          var user={lat:14.532908,lng:-91.681411};
          /*/Localizacion de la Central*/
          var marcador = new google.maps.Marker({
            map: mapa,
            animation: google.maps.Animation.DROP,
            title: 'Central de Monitoreo',
            position:central,
            visible: true,
            icon:image
          });
          console.log(beaches.agents.length)

             /*For para mostrar la posicion de los agentes*/
      for (var i = 0; i < beaches.agents.length; i++) {
                    var beach = beaches.agents[i];
                    var contentHtml='<div class="container">'
                                      +'<div class="row">'
                                        +'<div class="col-xs-12">'
                                          +'<div class="panel panel-border panel-danger">'
                                            +'<div class="panel-heading">'
                                              +'<h3 class="panel-title">Usuario: '+beach.user+'</h3>'
                                            +'</div>'
                                            +'<div class="panel-body">'
                                              +'<strong>Nombre: </strong> '+beach.first_name
                                              +'<br>'
                                              +'<strong>Apellido: </strong>'+beach.last_name
                                              +'<br>'
                                              +'<strong>NIP: </strong>'+beach.nip
                                              +'<br>'
                                              +'<img src="/assets/own/images/agents/'+beach.image+'" alt="No se pudo cargar la imagen" style="height: 100px;" class="modal-image">'
                                           +'</div>'
                                          +'</div>'
                                      +'</div>'
                                    +'</div>'
                    /*Inicio de infor Windows*/
                    infowindow[i] = new google.maps.InfoWindow({
                        content: contentHtml,
                    });
                    var markerAgents = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    map: mapa,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                    title: 'Agente: '+beach.user+'',
                    cont: i
                  });
                  markerAgents.addListener('click', function() {
                    infowindow[this.cont].open(mapa,this);
                  });
      }
            /*Fin del for que muestra a los agentes*/
            /*For para mostrar las alertas general*/
      for (var i = 0; i < beaches.alerts.length; i++) {
                  var beach = beaches.alerts[i];
                  var HtmlAlert='<div class="container">'
                                    +'<div class="row">'
                                      +'<div class="col-xs-12">'
                                        +'<div class="panel panel-border panel-warning">'
                                          +'<div class="panel-heading">'
                                            +'<h3 class="panel-title">Tipo de Alerta: Alerta General</h3>'
                                          +'</div>'
                                          +'<div class="panel-body">'
                                            +'<strong>Descripcion: </strong> '+beach.description
                                            +'<br>'
                                            +'<strong>Dirección Física: </strong>'+beach.address
                                            +'<br>'
                                            +'<strong>Fecha/Hora: </strong>'+beach.date+'/'+beach.hour
                                            +'<hr>'
                                            +'<button id="btnSend" class="btn btn-danger" onclick="deleteAlert('+beach.id+',1)">Desactivar Alarma</button>'
                                         +'</div>'
                                        +'</div>'
                                    +'</div>'
                                  +'</div>'
                  /*Inicio de infor Windows*/
                  infowindowAlert[i] = new google.maps.InfoWindow({
                      content: HtmlAlert,
                  });
                  if (beach.viewed==1) {
                        markerAlert[i] = new google.maps.Marker({
                        position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                        map: mapa,
                        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                        animation: google.maps.Animation.BOUNCE  ,
                        cont: i,
                        valueId:beach.id,
                        title:beach.object
                    });
                  }
                  else{
                      markerAlert[i] = new google.maps.Marker({
                      position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                      map: mapa,
                      icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                      animation: google.maps.Animation.DROP ,
                      cont: i,
                      valueId:beach.id,
                      title:beach.object
                    });
                  }
                  markerAlert[i].addListener('click', function() {
                    markerAlert[this.cont].setAnimation(null);
                    viewedAlerts(this.valueId,1);
                    infowindowAlert[this.cont].open(mapa,this);
                });
      }
          /*Fin del for de alertas generales*/
          /*Inicio de For Alertas de Carros*/
      for (var i = 0; i < beaches.alertsCar.length; i++) {
            var beach = beaches.alertsCar[i];
            var HtmlCar='<div class="container">'
                                +'<div class="row">'
                                  +'<div class="col-xs-12">'
                                    +'<div class="panel panel-border panel-warning">'
                                      +'<div class="panel-heading">'
                                        +'<h3 class="panel-title">Tipo de Alerta:Alerta de Carro</h3>'
                                      +'</div>'
                                      +'<div class="panel-body">'
                                        +'<strong>Tipo de Vehículo: </strong> '+beach.type
                                        +'<br>'
                                        +'<strong>Dirección Física: </strong>'+beach.address
                                        +'<br>'
                                        +'<strong>Marca Vehículo: </strong>'+beach.brand
                                        +'<br>'
                                        +'<strong>Color Vehículo: </strong>'+beach.color
                                        +'<br>'
                                        +'<strong>Placa Vehículo: </strong>'+beach.plate
                                        +'<br>'
                                        +'<strong>Fecha/Hora: </strong>'+beach.date+'/'+beach.hour
                                        +'<hr>'
                                        +'<button id="btnSend" class="btn btn-danger" onclick="deleteAlert('+beach.id+',2)">Desactivar Alarma</button>'
                                     +'</div>'
                                    +'</div>'
                                +'</div>'
                              +'</div>'
              /*Inicio de infor Windows*/
              infowindowCar[i] = new google.maps.InfoWindow({
                  content: HtmlCar,
              });
              if (beach.viewed==1) {
                    markerCar[i] = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    map: mapa,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                    animation: google.maps.Animation.BOUNCE  ,
                    cont: i,
                    valueId:beach.id,
                    title:beach.object
                });
              }else{
                  markerCar[i] = new google.maps.Marker({
                  position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                  map: mapa,
                  icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                  animation: google.maps.Animation.DROP ,
                  cont: i,
                  valueId:beach.id,
                  title:beach.object
                });
              }
              markerCar[i].addListener('click', function() {
                markerCar[this.cont].setAnimation(null);
                viewedAlerts(this.valueId,2);
                infowindowCar[this.cont].open(mapa,this);
            });
      }
          /*fin de for alertas de carros*/
          /*Iniico de alertas de robo*/
      for (var i = 0; i < beaches.alertStole.length; i++) {
              var beach = beaches.alertStole[i];
              var HtmlStole='<div class="container">'
                              +'<div class="row">'
                                +'<div class="col-xs-12">'
                                  +'<div class="panel panel-border panel-warning">'
                                    +'<div class="panel-heading">'
                                      +'<h3 class="panel-title">Tipo de Alerta:Alerta de Robo</h3>'
                                    +'</div>'
                                    +'<div class="panel-body">'
                                      +'<strong>Robo a : </strong> '+beach.robbery
                                      +'<br>'
                                      +'<strong>Caracteristicas Individuo: </strong>'+beach.individual
                                      +'<br>'
                                      +'<strong>Dirección: </strong>'+beach.address
                                      +'<br>'
                                      +'<strong>Objeto Robado: </strong>'+beach.object
                                      +'<br>'
                                      +'<strong>Fecha/Hora: </strong>'+beach.date+'/'+beach.hour
                                      +'<hr>'
                                      +'<button id="btnSend" class="btn btn-danger" onclick="deleteAlert('+beach.id+',3)">Desactivar Alarma</button>'
                                   +'</div>'
                                  +'</div>'
                              +'</div>'
                            +'</div>'
            /*Inicio de infor Windows*/
                infowindowStole[i] = new google.maps.InfoWindow({
                content: HtmlStole,
              });
              if (beach.viewed==1) {
                    markerStole[i] = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    map: mapa,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                    animation: google.maps.Animation.BOUNCE  ,
                    cont: i,
                    valueId:beach.id,
                    title:beach.object
                });
              }else{
                  markerStole[i] = new google.maps.Marker({
                  position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                  map: mapa,
                  icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                  animation: google.maps.Animation.DROP ,
                  cont: i,
                  valueId:beach.id,
                  title:beach.object
                });
              }
              markerStole[i].addListener('click', function() {
                markerStole[this.cont].setAnimation(null);
                viewedAlerts(this.valueId,3);
                infowindowStole[this.cont].open(mapa,this);
            });
      }
          /*Fin de las alertas de Robo*/
          /*Inicio de las ALertas 52*/
      for (var i = 0; i < beaches.alert52.length; i++) {
              var beach = beaches.alert52[i];
              var Html52='<div class="container">'
                              +'<div class="row">'
                                +'<div class="col-xs-12">'
                                  +'<div class="panel panel-border panel-warning">'
                                    +'<div class="panel-heading">'
                                      +'<h3 class="panel-title">Tipo de Alerta:Alerta 5-2</h3>'
                                    +'</div>'
                                    +'<div class="panel-body">'
                                      +'<strong>Descripción </strong> '+beach.description
                                      +'<br>'
                                      +'<strong>Fecha/Hora: </strong>'+beach.date+'/'+beach.hour
                                      +'<hr>'
                                      +'<button id="btnSend" class="btn btn-danger" onclick="deleteAlert('+beach.id+',4)">Desactivar Alarma</button>'
                                   +'</div>'
                                  +'</div>'
                              +'</div>'
                            +'</div>'
            /*Inicio de infor Windows*/
                infowindow52[i] = new google.maps.InfoWindow({
                content: Html52,
              });
              if (beach.viewed==1) {
                    marker52[i] = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    map: mapa,
                    animation: google.maps.Animation.BOUNCE  ,
                    cont: i,
                    valueId:beach.id,
                    title:beach.object
                });
              }else{
                  marker52[i] = new google.maps.Marker({
                  position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                  map: mapa,
                  animation: google.maps.Animation.DROP ,
                  cont: i,
                  valueId:beach.id,
                  title:beach.object
                });
              }
              marker52[i].addListener('click', function() {
                marker52[this.cont].setAnimation(null);
                viewedAlerts(this.valueId,4);
                infowindow52[this.cont].open(mapa,this);
            });
      }
          /*Fin de alertas 5-2*/
          /*Inicio de las ALertas Heridos Fallecidos*/
      for (var i = 0; i < beaches.alertDeath.length; i++) {
              var beach = beaches.alertDeath[i];
              var htmlDeath='<div class="container">'
                              +'<div class="row">'
                                +'<div class="col-xs-12">'
                                  +'<div class="panel panel-border panel-warning">'
                                    +'<div class="panel-heading">'
                                      +'<h3 class="panel-title">Tipo de Alerta:Alerta Heridos/Fallecidos</h3>'
                                    +'</div>'
                                    +'<div class="panel-body">'
                                      +'<strong>Cantidad : </strong> '+beach.quantity
                                      +'<br>'
                                      +'<strong>Tipo de Persona: </strong>'+beach.personType
                                      +'<br>'
                                      +'<strong>Tipo de Alerta: </strong>'+beach.alertType
                                      +'<br>'
                                      +'<strong>Dirección: </strong>'+beach.address
                                      +'<br>'
                                      +'<strong>Causa: </strong>'+beach.cause
                                      +'<br>'
                                      +'<strong>Fecha/Hora: </strong>'+beach.date+'/'+beach.hour
                                      +'<hr>'
                                      +'<button id="btnSend" class="btn btn-danger" onclick="deleteAlert('+beach.id+',3)">Desactivar Alarma</button>'
                                   +'</div>'
                                  +'</div>'
                              +'</div>'
                            +'</div>'
            /*Inicio de infor Windows*/
                infowindow52[i] = new google.maps.InfoWindow({
                content: htmlDeath,
              });///1 no lo ha visto,0 ya fue visto
              if (beach.viewed==1) {
                    markerDeath[i] = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    map: mapa,
                    animation: google.maps.Animation.BOUNCE  ,
                    cont: i,
                    valueId:beach.id,
                    title:beach.object
                });
              }else{
                  markerDeath[i] = new google.maps.Marker({
                  position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                  map: mapa,
                  animation: google.maps.Animation.DROP ,
                  cont: i,
                  valueId:beach.id,
                  title:beach.object
                });
              }
              markerDeath[i].addListener('click', function() {
                markerDeath[this.cont].setAnimation(null);
                viewedAlerts(this.valueId,5);
                infowindow52[this.cont].open(mapa,this);
            });
      }
          /*Fin de alerta de Heridos Fallecidos*/
            mapa.setCenter(central);
        },function(error){
          console.log(error);
        });


    });/*FIN DEL AJAX*/


}/*Fin de Init Map*/

/*Funicon para desactivar las alertas generadas*/
function deleteAlert(value,val)
{
  $("#btnSend").prop('disabled', false);
    var dataArray={
      id:value,
      val:val
    };
    var verification_data = new AjaxRequest( dataArray, '/admin/maps/deleteAlert', $('#token').val());
    verification_data.sending(function ( responseError ) {
        if ( responseError ) {
            $.Notification.notify('error','top rigth', 'Error', 'Usuario o contraseña incorrecta.');

        } else {
          $.Notification.notify('success','top rigth', 'Correcto', 'Se Desactivo la Alarma correctamente.');
          setTimeout(function(){ location.reload(); }, 3000);
        }
    });
}/**Fin de funcion para remover alerta**/

/*Funcion para el visto de las alertas*/
function viewedAlerts(id,val)
{
  var dataArray={
    id:id,
    val:val
  };
  var verification_data = new AjaxRequest( dataArray, '/admin/maps/changeViewed', $('#token').val());
  verification_data.sending(function ( responseError ) {
      if ( responseError ) {
          $.Notification.notify('error','top rigth', 'Error', 'Se genero un error inesperado.');
      }
  });
}/*Fin del visto de alertas*/
