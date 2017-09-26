'use strict';

var GlobalVars = (function(){
  var connection = {},
      socket = null;

  return {
    getSocket: function() {
      return socket;
    },
    setConnection: function(connecParam) {
      connection = connecParam;
    },
    getConnection: function() {
      return connection;
    },
    updateIdConnect: function(id) {
      connection._id = id;
    },
    updateCentralConnect: function(central) {
      connection.central = central;
    },
    socketInit: function(callback) {
      // socket = io.connect('http://192.168.10.10:5000/agent', { query: 'id_user=' + user_agent.id });
      socket = io.connect('https://alertapnc.com:5000/agent', { query: 'id_user=' + user_agent.id, 'sync disconnect on unload': true });

      socket.on('error',function(err) {
          socket.disconnect();
          callback(false, err);
      });

      socket.on('connect', function () {
        callback(true, 'Bien!');
      });

    }
  };
  
})();