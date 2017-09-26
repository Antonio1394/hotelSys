"use strict";

/*
* Clase con funcionalidad para verificaciones por ajax
*/

(function(){

    self.AjaxRequest = function(dataArray, url, token) {
        this.dataArray = dataArray;
        this.token = token;
        this.url = url;
    }

    self.AjaxRequest.prototype = {
        sending: function(callback) {
            $.ajax({
                url: this.url,
                headers: {'X-CSRF-TOKEN': this.token},
                type: "POST",
                data: {
                    dataArray: this.dataArray
                },
                success: function(response) {
                    if ( response == "ok") {
                        callback(null);
                    } else {
                        return callback(new Error("Error en la petición"));
                    }
                }
            });
        }
    }

})();

/*
* Clase con funcionalidad para cargar contenido dinamicamente en el modal
*/

(function() {
    self.LoadModal = function(containerBase, titleEdit, btn) {
        this.containerBase = containerBase;
        this.titleEdit = titleEdit;
        this.btn = btn;
        this.url = "";
    }

    self.LoadModal.prototype = {
        prepareView: function() {
            this.containerBase.html('<h2 class="text-center">Cargando <i class="fa fa-refresh fa-spin"></i></h2>');
            this.titleEdit.text(this.btn.data('title'));
            this.url = this.btn.data('url');
            this.loadView();
        },
        loadView: function() {
            this.containerBase.load(this.url, function( response, status, xhr ) {
                if ( status == "error" ) {
                    var msg = "<h4 class='text-center'><strong>Ohh!</strong> A ocurrido un error intente nuevamente.</h4>";
                    msg += '<div class="modal-footer" style="padding-bottom: 0px;margin-top:35px"><button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button></div>';
                    $(this).html( msg );
                }
            });
        }
    }
})();

(function() {
    self.AlertsPoli = function() {
        this.icon = '/assets/images/logo_dark.png';
        this.title = 'Alerta';
    }

    self.AlertsPoli.prototype = {
        activeAlerts: function() {

            if (!("Notification" in window)) {

                alert("Su explorador no soporta notificaciones de este tipo.");

            } else if (Notification.permission === "granted") {

                Push.create("Alerta", {
                    body: 'Ya estan activadas las notificaciones!',
                    icon: '/assets/images/logo_dark.png',
                    vibrate: [200, 100, 200, 100, 200, 100, 200]
                });

            } else if(Notification.permission !== 'denied') {
                
                Notification.requestPermission(function (permission) {
                    if (permission === "granted") {
                        Push.create("Alerta", {
                            body: 'Notificaciones activadas correctamente!',
                            icon: '/assets/images/logo_dark.png',
    
                            vibrate: [200, 100, 200, 100, 200, 100, 200]
                        });
                    }
                });                

            }
        },
        displayMessage: function(sms, title) {
            document.getElementById('soundAppAlert').play();
            if (Notification.permission === "granted") {

                Push.create(title, {
                    body: sms,
                    icon: '/assets/images/logo_dark.png',
                    vibrate: [200, 100, 200, 100, 200, 100, 200]
                });

            } else {
                $.Notification.autoHideNotify('custom', 'top right', title, sms);
            }
        },
        displayNewConversation: function() {
            if (Notification.permission === "granted") {

                Push.create('¡Alerta!', {
                    body: 'Nueva conversación creada.',
                    icon: '/assets/images/logo_dark.png',
                    vibrate: [200, 100, 200, 100, 200, 100, 200]
                });

            } else {
                $.Notification.autoHideNotify('custom', 'top right', '¡Alerta!', 'Nueva conversación creada.');
            }
        }
    }
})();
