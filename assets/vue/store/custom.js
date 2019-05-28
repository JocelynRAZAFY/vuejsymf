export default {
    namespaced: true,
    state: {
        customs: [],
    },
    getters:{
        customs (state){
            return state.customs
        }
    },
    mutations:{
        'SET_CUSTOMS' (state,customs){
            state.customs = customs
        }
    },
    actions:{
        setCustoms(context,customs){
            context.commit('SET_CUSTOMS',customs)
        },
    }
}