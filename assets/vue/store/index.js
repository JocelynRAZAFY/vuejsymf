import Vue from 'vue'
import Vuex from 'vuex'
import UserModule from './user'
import WebsocketModule from './websocket'
import MdbModule from './mdb'
import CustomModule from './custom'
import PersonneModule from './personne'
import ChartModule from './chart'

Vue.use(Vuex)
export default new Vuex.Store({
    modules: {
        user: UserModule,
        websocket: WebsocketModule,
        mdb: MdbModule,
        custom: CustomModule,
        personne: PersonneModule,
        chart: ChartModule
    },
})