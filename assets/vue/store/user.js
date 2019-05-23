import  UserAPI from '../api/user'
import WebSocket from '../services/websocket'

export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        user: {},
        token: null
    },
    getters: {
        isLoading (state) {
            return state.isLoading
        },
        hasError (state) {
            return state.error !== null
        },
        error (state) {
            return state.error
        },
        user (state) {
            return state.user
        },
        getToken (state) {
            return state.token
        },
        getWebSocket(state){
            return state.webSocket
        }
    },
    mutations: {
        'SET_LOGOUT' (state) {
            state.token = null
        },
        'SET_TOKEN' (state, token) {
            state.token = token
        },
        'SET_TEST' (state, user) {
            state.user = user
        },
        'SET_USER' (state) {
            state.isLoading = true
            state.error = null
        },
        'SET_USER_SUCCESS' (state, token) {
            state.isLoading = false
            state.error = null
            state.token = token
            localStorage.setItem('userToken', token)
        },
        'SET_USER_ERROR' (state, error) {
            state.isLoading = false
            state.error = error
            state.user = {}
            state.token = null
        },
        'FETCHING_USER' (state) {
            state.isLoading = true
            state.error = null
            state.user = {}
        },
        'FETCHING_USER_SUCCESS' (state, user) {
            state.isLoading = false
            state.error = null
            state.user = user
        },
        'FETCHING_USER_ERROR' (state, error) {
            state.isLoading = false
            state.error = error
            state.user = {}
        }
    },
    actions: {
        async loginUser({commit,dispatch},param){
            commit('SET_USER')

            try {
                const res = await UserAPI.loginUser(param)
                commit('SET_USER_SUCCESS', res.data.token)
                await dispatch('getData')
            } catch (err) {
                commit('SET_USER_ERROR', err)
            }

        },
        async getData({commit}){
            const token = localStorage.getItem('userToken')
            try {
                const res = await UserAPI.getData(token)
                commit('FETCHING_USER_SUCCESS', res.data.data)

                let param = {
                    type: 'add',
                    user: res.data.data
                }
                WebSocket.sendMessage(param)
            } catch (err) {
                commit('SET_USER_ERROR', err)
            }
        },
        async sendData({commit,dispatch},param){
            console.log(param)
            // sendMessageWs(message)
        },
        test(param){
            console.log(param)
           // return param
        }

    }
}