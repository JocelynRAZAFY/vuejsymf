export default {
    namespaced: true,
    state: {
        information: null,
    },
    getters:{
        information (state){
            return state.information
        }
    },
    mutations:{
        'SET_INFORMATION' (state,information){
            state.information = information
        }
    },
    actions:{
        setInformation({commit},information){
            commit('SET_INFORMATION',information)
        },
    }
}