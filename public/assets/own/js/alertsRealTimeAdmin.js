'use strict';

var socketAlert = io('https://alertapnc.com:5000');

socketAlert.on('alerts-channel:App\\Events\\AlertEvent', function(data) {
    var alert_poli = new AlertsPoli(),
        title = '¡Alerta Nueva!',
        sms = data.alert.alert_type;
    alert_poli.displayMessage(sms, title);
    GlobalVars.getVM().varCheckAlert = true;
    localStorage.setItem('check_alert', true);
});