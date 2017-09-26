'use strict';

var GlobalVars = (function() {

	var socket = null,
		vm = null,
		conversation_now = {},
		connectionsActive = [];

	/**
	*
	* FUNCIONES PARA VUE.JS
	*
	**/

	function componentsVue() {
		Vue.component('chatconver', {
			template: '#conver-template',
			props: ['convercomponent'],
			ready: function() {

				socket.emit('loadMessage', { conversation: this.convercomponent }, function(data) {
					loadMessages(data);
				});

				conversation_now = {
					_id: this.convercomponent._id,
					id_user: this.convercomponent.id_user,
					image: this.convercomponent.image,
					user_central: this.convercomponent.user_central,
					username: this.convercomponent.username
				};

				this.convercomponent.see = true;
			},
			methods: {
				backMaster: function() {
					$('.backMaster').prop('disabled', true);
					$('.deleteConver').prop('disabled', true);
					
					let _this = this;

					socket.emit('changeConverNow', false, function(data){
						conversation_now._id = '';
						_this.$parent.list = true;
					});	
				},
				deleteConver: function() {
					$('.backMaster').prop('disabled', true);
					$('.deleteConver').prop('disabled', true);

					let _this = this;

					socket.emit('deleteConversation', { conversation_now }, function(data){
						if ( !data.error ) {
							$.Notification.notify('success','top rigth', 'Bien!!', 'Conversación eliminada.');

							for(let index in _this.$parent.conversations) {
								if(_this.$parent.conversations[index].id_user == conversation_now.id_user) {
									_this.$parent.conversations.splice(index, 1);
								}
							}

							_this.backMaster();
						} else {
							$.Notification.notify('error','top rigth', 'Error!!', 'Ha ocurrido un error.');
							$('.backMaster').prop('disabled', false);
							$('.deleteConver').prop('disabled', false);
						}
					});
				}
			}
		});

		Vue.component('agent-select', {
	        template: "#vueAgentsComponent",
	        data: function() {
	            return {
	            	agentstoselect: [],
	            	displayAgent: [],
	                searchString: "",
	                selectAgent: ''
	            }
	        },
	        methods: {
	        	loadAgents: function() {
	        		let _this = this;

	        		this.$parent.$http.get('/admin/chat/getAgents').then((req) => {
	        			_this.agentstoselect = JSON.parse(JSON.stringify(req.data.agents_list));
	        			_this.displayAgent = JSON.parse(JSON.stringify(req.data.agents_list));
		            }, (req) => {
		                console.log('Error no se pudo realizar la accion.');
		            });
	        	},
	            searchAgent: function() {
	            	var _this = this;
	            	
	            	var middlewareAgents = jQuery.map(this.agentstoselect, function(obj) {

	                    var full_name = obj.first_name.toLowerCase() + ' ' + obj.last_name.toLowerCase();
	                    var dpi = obj.dpi.toLowerCase();
	                    var stringSearch = _this.searchString.toLowerCase();

	                    if ((full_name.search(stringSearch) >= 0) || (dpi.search(stringSearch) >= 0))
	                        return obj;
	                });

                	this.displayAgent = middlewareAgents;
	            },
				converCreate: function() {
					let data_agent = {};

					if (this.selectAgent == '') {
						$.Notification.notify('error','top rigth', 'Error!!', 'Selecciona un agente');
					}

					for(let index in this.$parent.conversations) {
						if(this.$parent.conversations[index].id_user == this.selectAgent) {
							$.Notification.notify('error','top rigth', 'Error!!', 'Ya existe una conversación con este agente.');
							return;
						}
					}

					for(let index in this.agentstoselect) {
						if(this.agentstoselect[index].id == this.selectAgent) {
							data_agent = {
								id_user: this.agentstoselect[index].id,
								username: this.agentstoselect[index].first_name + ' ' + this.agentstoselect[index].last_name,
								image: this.agentstoselect[index].image
							};
						}
					}

					$.Notification.notify('warning','top rigth', 'Alerta!!', 'Cargando espere por favor...');

					let _this = this;

					socket.emit('createConversation', { data_agent }, function(data) {

						if ( !data.error ) {
							let alert_poli = new AlertsPoli();
							alert_poli.displayNewConversation();

							_this.$parent.conversations.push(data.new_conversation);
							setTimeout(function(){
				            	_this.$parent.getStates();
				            }, 800);

				            $('#modal-maincreateconver').modal('hide');
						} else {
							$.Notification.notify('error','top rigth', 'Error!!', 'Ha ocurrido un error.');
						}

					});
				}
	        }
	    });
	}

	function mainVue(data) {
		vm = new Vue({
				el: "body",
				data: {
					conversations: data.conversations,
					displayConversations: data.conversations,
					conver: null,
					list: true,
					loadcbo: true,
					chatview: false,
					search: "",
        			varCheckAlert: false
				},
				ready: function() {
			        if(localStorage.getItem('check_alert'))
			            this.varCheckAlert = true;
			    },
				methods: {
					showchat: function() {
						this.chatview = !this.chatview;
					},
					createShowconver: function() {
						if(this.loadcbo) {
							for(let index in this.$children) {
								if(this.$children[index].constructor.name == 'AgentSelect')
							 		this.$children[index].loadAgents();
							}
							this.loadcbo = !this.loadcbo;
						}
					},
					searchConversation: function() {
						var _this = this;
			            var displayMiddleware = jQuery.map(this.conversations, function(obj) {

			                var name = obj.username.toLowerCase();
			                var stringSearch = _this.search.toLowerCase();

			                if (name.search(stringSearch) >= 0)
			                    return obj;
			            });

			            this.displayConversations = displayMiddleware;
			            
			            setTimeout(function(){
			            	_this.getStates();
			            }, 800);
					},
					displayChat: function(event) {
						var jqueryBtn = $(event.currentTarget);
						var conver_id = jqueryBtn.attr("id");

			            var converMiddleware = jQuery.map(this.conversations, function(obj) {

			                var _id = obj._id.toLowerCase();
			                var stringSearch = conver_id;

			                if (_id.search(stringSearch) >= 0) 
			                    return obj;

			            });

			        	this.conver = converMiddleware[0];
			        	this.list = false;
					},
					getStates: function() {
						for(let index in this.conversations) {
							$("#" + this.conversations[index]._id).siblings('p').find('.state').html('<i class="fa fa-circle-o" aria-hidden="true" style="color: red;"></i>');
							for(let indexAc in connectionsActive) {
								if (connectionsActive[indexAc].id_user == this.conversations[index].id_user)
									$("#" + this.conversations[index]._id).siblings('p').find('.state').html('<i class="fa fa-circle" aria-hidden="true" style="color: green;"></i>');
							}
						}
					},
					getMesssageSee: function(conver_id) {
						for(let index in this.conversations) {
							if (this.conversations[index]._id == conver_id) {
								this.conversations[index].see = false;
							}
						}
					},
					addNewConversation: function(new_conver) {
						let _this = this;
						this.conversations.push(new_conver);
						setTimeout(function(){
			            	_this.getStates();
			            }, 800);
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
	}

	/**
	*
	* FUNCION PARA CARGAR MENSAJES
	*
	**/

	function loadMessages(data) {
		console.log('************** Socket cargar mensajes de conversacion **************');
		connectionsActive = data.connectionsActive;
		$.ChatApp.init($('.chat-send .btn'), $('.chat-input'), $('.conversation-list'), $("body"));
		$.ChatApp.setConnection(data.connection);
		$.ChatApp.setSocket(socket);

		for(var key in data.messages) {
	       var time = data.messages[key].date.split(" ");
	       if(data.messages[key].central)
	           $('<li class="clearfix odd"><div class="chat-avatar"><img src="/assets/own/images/central.png" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Central</i><p>' + $($.parseHTML(data.messages[key].message)).text() + '</p></div></div></li>').appendTo('.conversation-list');
	       else
	           $('<li class="clearfix"><div class="chat-avatar"><img src="/assets/own/images/agents/' + data.connection.image + '" alt="male"><i>' + $($.parseHTML(time[1])).text() + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>' + $($.parseHTML(data.connection.username)).text() + '</i><p>' + $($.parseHTML(data.messages[key].message)).text() + '</p></div></div></li>').appendTo('.conversation-list');
	       
	        $('.chat-input').val('');
	        $('.chat-input').focus();
	   	}

		$('.conversation-list').scrollTo('100%', '100%', {
		    easing: 'swing'
		});
	}

	return {
		getSocket: function() {
			return socket;
		},
		initVM: function(vmParam) {
			componentsVue();
			mainVue(vmParam);
		},
		getVM: function() {
			return vm;
		},
		getConverNow: function() {
			return conversation_now;
		},
		setConnecActive: function(connecActivParam) {
			connectionsActive = connecActivParam;
		},
		socketInit: function(callback) {
			// socket = io('http://192.168.10.10:5000/central');
			socket = io('https://alertapnc.com:5000/central', { 'sync disconnect on unload': true });

			socket.on('error',function(err) {
			  	console.log(err);
			  	socket.disconnect();
				callback(false, err);
			});

			socket.on('connect', function () {
				callback(true, 'Bien!');
			});
		}
	}
	
})();