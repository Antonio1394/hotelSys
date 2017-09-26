'use strict';

// var socketAlert = io('http://192.168.10.10:5000'),
var socketAlert = io('https://alertapnc.com:5000'),
vm = new Vue({
    'el': 'body',
    data: {
        chatview: false,
        varCheckAlert: false
    },
    ready: function() {
        if(localStorage.getItem('check_alert'))
            this.varCheckAlert = true;
    },
    methods: {
        showchat: function() {
            this.chatview = !this.chatview;

            setTimeout(function(){
	            $('.chat-input').focus();
		    	$('.conversation-list').scrollTo('100%', '100%', {
		    	    easing: 'swing'
		    	});
            }, 400);
        },
        activeAlert: function() {
            var alert_poli = new AlertsPoli();
            alert_poli.activeAlerts();
        },
        checkAlert: function() {
            this.varCheckAlert = false;
            localStorage.removeItem('check_alert');
        }
    }
});

socketAlert.on('alerts-channel:App\\Events\\AlertEvent', function(data) {
    var alert_poli = new AlertsPoli(),
        title = '¡Alerta Nueva!',
        sms = data.alert.alert_type;
    alert_poli.displayMessage(sms, title);
    vm.varCheckAlert = true;
    localStorage.setItem('check_alert', true);
});