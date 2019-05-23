
export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        messageReceived: null,
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
        messageReceived (state) {
            return state.messageReceived
        }
    },
    mutations: {
        'SET_MESSAGE_RECEIVED' (state, messageReceived) {
            state.messageReceived = messageReceived
        }
    },
    actions: {

    }
}