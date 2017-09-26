'use strict'

//google.maps.event.addDomListener(window,'click',initMap);
var mapa;
var marcador_tiempo_real;
var central={lat:14.539809, lng:-91.678978};
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
  var start=document.getElementById("start").value;
  var end=document.getElementById("end").value;
  $.get("/admin/records/getRecords",{start:start,end:end} ,function( data ) {
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
                                         +'</div>'
                                        +'</div>'
                                    +'</div>'
                                  +'</div>'
                  /*Inicio de infor Windows*/
                  infowindowAlert[i] = new google.maps.InfoWindow({
                      content: HtmlAlert,
                  });
                  var markerAlert = new google.maps.Marker({
                    position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                    map: mapa,
                    animation: google.maps.Animation.DROP,
                    icon:'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                    title: beach.description,
                    cont: i,
                });
                  markerAlert.addListener('click', function() {
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
                                     +'</div>'
                                    +'</div>'
                                +'</div>'
                              +'</div>'
              /*Inicio de infor Windows*/
              infowindowCar[i] = new google.maps.InfoWindow({
                  content: HtmlCar,
              });
              var markerCar = new google.maps.Marker({
                position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                map: mapa,
                animation: google.maps.Animation.DROP,
                icon:'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                cont: i,
                title:beach.type,
            });
              markerCar.addListener('click', function() {
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
                                   +'</div>'
                                  +'</div>'
                              +'</div>'
                            +'</div>'
            /*Inicio de infor Windows*/
                infowindowStole[i] = new google.maps.InfoWindow({
                content: HtmlStole,
              });
              var markerStole = new google.maps.Marker({
                position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                map: mapa,
                animation: google.maps.Animation.DROP,
                icon:'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                cont: i,
                title:beach.object
            });
              markerStole.addListener('click', function() {
                infowindowStole[this.cont].open(mapa,this);
            });
      }

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
                                   +'</div>'
                                  +'</div>'
                              +'</div>'
                            +'</div>'
            /*Inicio de infor Windows*/
                infowindow52[i] = new google.maps.InfoWindow({
                content: Html52,
              });
              var markerStole = new google.maps.Marker({
                position: {lat: parseFloat(beach.latitude), lng: parseFloat(beach.longitude)},
                map: mapa,
                animation: google.maps.Animation.DROP,
                cont: i,
                title:beach.object
            });
              markerStole.addListener('click', function() {
                infowindow52[this.cont].open(mapa,this);
            });
      }
          /*Fin de alerta de robo*/
            mapa.setCenter(central);
        },function(error){
          console.log(error);
        });


    });/*FIN DEL AJAX*/


}/*Fin de Init Map*/
