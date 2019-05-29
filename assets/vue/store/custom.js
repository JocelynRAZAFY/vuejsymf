import customApi from '../api/customApi'

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
        async listCustoms({context},token){
            try {
                console.log(context.getters('user/getToken'))
                const res = await customApi.listCustom(localStorage.getItem('userToken'))
                context.commit('SET_CUSTOMS', res.data)
            } catch (err) {

            }
        },
    }
}