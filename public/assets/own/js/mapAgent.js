'use strict'

google.maps.event.addDomListener(window,'load',initMap);

var mapa;
var marcador_tiempo_real;
var central={lat:14.539809, lng:-91.678978};
var corLng;
var corLat;

var image = {
    url: '/station.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(70, 65),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };

function initMap() {
  var opcionesMapa = {
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    mapa = new google.maps.Map(document.getElementById('map'),opcionesMapa);
    navigator.geolocation.getCurrentPosition(function(posicion){
      var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
      var user={lat:14.532908,lng:-91.681411};
      var corLng=posicion.coords.longitude;///obtengo la longitude
      var corLat=posicion.coords.latitude;////obtengo la latitude
      /*/Localizacion de la Central*/
      var marcador = new google.maps.Marker({
        map: mapa,
        animation: google.maps.Animation.DROP,
        title: 'Central de Monitoreo',
        position:central,
        visible: true,
        icon:image
      });
      /*/Toma la ubicacion del usuario*/
      var marcador = new google.maps.Marker({
        map: mapa,
        animation: google.maps.Animation.DROP,
        title: 'Ubicacion del Usuario',
        position:geolocalizacion,
        visible: true
      });
      document.getElementById('labelLng').innerHTML = corLng;////Envia la longitude a la label
      document.getElementById('labelLat').innerHTML = corLat;////Envia la longitude a la label
      mapa.setCenter(geolocalizacion);
      console.log(corLng);
      navigator.geolocation.watchPosition(actualizarPosicion,function(error){console.log(error);},{maximumAge: 0});

      var dataArray = {
          lt: corLat,
          ln: corLng,
          id: $("#idUser").val()
          };
      var verification_data = new AjaxRequest(dataArray, '/user/refresh', $('#token').val());
        verification_data.sending(function(responseError) {
              if (responseError) {
                  $.Notification.notify('error','top rigth', 'Error', 'Error intente de Nuevo.');
              } else {
                  $.Notification.notify('success','top rigth', 'información', 'Se actualizo correctamente la Ubicación.');
              }
        });
    },function(error){
      console.log(error);
    });


    function actualizarPosicion(posicion){
			var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
			marcador_tiempo_real.setPosition(geolocalizacion);
			mapa.setCenter(geolocalizacion);
		}

}
