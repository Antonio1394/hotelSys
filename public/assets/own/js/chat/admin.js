'use strict';

GlobalVars.socketInit(function(error, sms) {

	if (error) {

		GlobalVars.getSocket().emit('registerCentral', { user: user_agent }, function(data) {

				console.log('************** Socket para cargar conversaciones **************');
				GlobalVars.setConnecActive(data.connectionsActive);

				if ( GlobalVars.getVM() == null) {
					GlobalVars.initVM(data);
					GlobalVars.getVM().getStates();
				}
		});
		
		GlobalVars.getSocket().on('newMessageToAdmin', function(data) {
			console.log('************** Socket para recivir mensajes de usuarios **************');
			if (data.new) {
				GlobalVars.getVM().addNewConversation(data.connection);
			}

			if ( GlobalVars.getConverNow()._id == data.connection._id ) {
				let time = data.new_message.date.split(" ");

				$('<li class="clearfix"><div class="chat-avatar"><img src="/assets/own/images/agents/' + $($.parseHTML(data.connection.image)).text() + '" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>' + $($.parseHTML(data.connection.username)).text() + '</i><p>' + $($.parseHTML(data.new_message.message)).text() + '</p></div></div></li>').appendTo('.conversation-list');

				$('.chat-input').val('');
				$('.chat-input').focus();
				$('.conversation-list').scrollTo('100%', '100%', {
				    easing: 'swing'
				});
			} else {
				var alert_poli = new AlertsPoli(),
					sms = 'Nuevo mensaje de ' + $($.parseHTML(data.connection.username)).text() + '.',
					title = 'Nuevo mensaje';
				alert_poli.displayMessage(sms, title);
				GlobalVars.getVM().getMesssageSee(data.connection._id);
			}
		});

		GlobalVars.getSocket().on('refreshActives', function(data) {
			console.log('************ Socket para refrescar activos ******************');
			GlobalVars.setConnecActive(data.connectionsActive);
			GlobalVars.getVM().getStates();
		});

	} else {
		window.location = '/auth/logout';
	    swal({
	        title: "Error",
	        text: sms + ' espere por favor...',
	        type: "error",
	        showConfirmButton: false
	    });
	}

});


$(window).bind('beforeunload', function(eEvent){
	GlobalVars.getSocket().disconnect();
});



