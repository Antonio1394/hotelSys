'use strict';

GlobalVars.socketInit(function(error, sms) {

  if (error) {

    GlobalVars.getSocket().emit('subscribe', user_agent, function(data) {
      console.log('************** Socket para cargar mensajes del chat ******************** ');
        GlobalVars.setConnection({ 
            mySocket: data.connection.mySocket,
            central: data.connection.central,
            id_user: data.connection.id_user,
            username: data.connection.username,
            image: data.connection.image,
            _id: data.connection._id
        });

        console.log(GlobalVars.getConnection());
        console.log(data.messages);

        $.ChatApp.init();
        $.ChatApp.setUser(GlobalVars.getConnection());
        $.ChatApp.setSocket(GlobalVars.getSocket());

        for(var key in data.messages) {
           var time = data.messages[key].date.split(" ");
           if(data.messages[key].central)
               $('<li class="clearfix"><div class="chat-avatar"><img src="/assets/own/images/central.png" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Central</i><p>' + $($.parseHTML(data.messages[key].message)).text() + '</p></div></div></li>').appendTo('.conversation-list');
           else
               $('<li class="clearfix odd"><div class="chat-avatar"><img src="/assets/own/images/agents/' + $($.parseHTML(GlobalVars.getConnection().image)).text() + '" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>' + GlobalVars.getConnection().username + '</i><p>' + $($.parseHTML(data.messages[key].message)).text() + '</p></div></div></li>').appendTo('.conversation-list');
           
        }

        $('.chat-input').val('');
        $('.chat-input').focus();
        $('.conversation-list').scrollTo('100%', '100%', {
            easing: 'swing'
        });
    });

    GlobalVars.getSocket().on('startConversation', function(data) {
      console.log('************** Socket para comenzar conversacion ******************** ');
      GlobalVars.updateIdConnect(data._id);
      console.log(GlobalVars.getConnection());
    });

    GlobalVars.getSocket().on('deleteConversation', function() {
      console.log('************** Socket eliminacion de conversacion ******************** ');
      GlobalVars.updateIdConnect(null);
      $('.conversation-list').empty();
    }); 

    GlobalVars.getSocket().on('refreshCentral', function(data) {
        console.log('************** Socket para refrescar central ******************** ');
        GlobalVars.updateCentralConnect(data.central);
        $.ChatApp.setUser(GlobalVars.getConnection());
    });

    GlobalVars.getSocket().on('newMessageToAgent', function(data) {
    	console.log('************** Socket para recivir mensaje nuevo ******************** ');

      let time = data.new_message.date.split(" ");

    	$('<li class="clearfix"><div class="chat-avatar"><img src="/assets/own/images/central.png" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Central</i><p>' + $($.parseHTML(data.new_message.message)).text() + '</p></div></div></li>').appendTo('.conversation-list');

    	$('.chat-input').val('');
    	$('.chat-input').focus();
    	$('.conversation-list').scrollTo('100%', '100%', {
    	    easing: 'swing'
    	});

      if (!vm.chatview) {
        var alert_poli = new AlertsPoli(),
          sms = 'Nuevo mensaje de la central.',
          title = 'Nuevo mensaje';
        alert_poli.displayMessage(sms, title);
      }

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

