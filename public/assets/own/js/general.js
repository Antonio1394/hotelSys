'use strict';

var smsEmpty = 'El campo es requerido';

$(document).ready(function() {

    $("#element").introLoader({
        animation: {
            name: 'cssLoader',
            options: {
                exitFx: 'slideUp',
                ease: "easeInOutCirc",
                style: 'dark',
                delayBefore: 1000,
                exitTime: 500,
                onAfter: function() {
                    if (typeof(alertSuccess) != "undefined") {
                        $.Notification.notify('success','top rigth', 'Bien!!', alertSuccess);
                    }

                    if (typeof(alertErrors) != "undefined") {
                        var smsErrors = listErrors(alertErrors);
                        $.Notification.notify('error','top rigth', 'Error!!', smsErrors);
                    }

                    if (typeof(alertError) != "undefined") {
                        $.Notification.notify('error','top rigth', 'Error!!', alertError);
                    }
                }
            }
        },

        spinJs: {
            lines: 13, // The number of lines to draw
            length: 20, // The length of each line
            width: 10, // The line thickness
            radius: 30, // The radius of the inner circle
            corners: 1, // Corner roundness (0..1)
            color: '#fff', // #rgb or #rrggbb or array of colors
        }
    });

    /*
     * Funcion para cargar contenido dinamicamente
     */

    $('.loadModal').on('click', function(e) {
        e.preventDefault();
        var loadModal = new LoadModal($("#containerBase"), $(".titleEdit"), $(this));
        loadModal.prepareView();
    });

});

/**
 * Funciones globales
 */

// Funcion para convertir string a json

function convertToJson(string) {
    string = string.replace(/\\n/g, "\\n")
        .replace(/\\'/g, "\\'")
        .replace(/\\"/g, '\\"')
        .replace(/\\&/g, "\\&")
        .replace(/\\r/g, "\\r")
        .replace(/\\t/g, "\\t")
        .replace(/\\b/g, "\\b")
        .replace(/\\f/g, "\\f");

    string = string.replace(/[\u0000-\u0019]+/g, "");

    return JSON.parse(string)
}

// Funcion para listar los errores enviados por el servidor

function listErrors(alertErrors) {
    var array = convertToJson(alertErrors);
    var smsErrors = '<ul>';

    for (var i = 0; i < array.length; i++) {
        smsErrors += '<li>' + array[i] + '</li>';
    }
    smsErrors += '</ul>';

    return smsErrors;
}
