import Vue from 'vue'
import Vuex from 'vuex'
import UserModule from './user'
import WebsocketModule from './websocket'
import MdbModule from './mdb'
import CustomModule from './custom'

Vue.use(Vuex)
export default new Vuex.Store({
    modules: {
        user: UserModule,
        websocket: WebsocketModule,
        mdb: MdbModule,
        custom: CustomModule,
    },
})