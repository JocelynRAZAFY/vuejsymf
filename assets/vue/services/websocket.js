const webSocket = WS.connect("ws://127.0.0.1:8091");
var sendMessageWs
webSocket.on("socket/connect", function (session) {
    //session is an Autobahn JS WAMP session.
    console.log("Successfully Connected!");

    session.subscribe("acme/channel", function(uri, payload){
        if(store.getters['user/getToken'] && payload.msg){
            if(payload.msg.type === 'add'){
                store.commit('user/SET_TEST',payload.msg.user)
                store.commit('websocket/SET_MESSAGE_RECEIVED', 'nouvelle utilisateur disponible')
            }
        }
    });
    sendMessageWs = function(message){
        // console.log(message)
        session.publish("acme/channel", message);
    }


})

webSocket.on("socket/disconnect", function (error) {
    //error provides us with some insight into the disconnection: error.reason and error.code

    console.log("Disconnected for " + error.reason + " with code " + error.code);
})
import store from '../store';

export default {
    sendMessage(param){
        sendMessageWs(param)
    }
}