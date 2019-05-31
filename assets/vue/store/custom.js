import customApi from '../api/customApi'

export default {
    namespaced: true,
    state: {
        customs: {},
    },
    getters:{
        customs (state){
            return state.customs
        }
    },
    mutations:{
        'SET_CUSTOMS' (state,customs){
            state.customs = {listes: customs, loaded: true}
        },
        'SET_CUSTOM' (state,custom){
            
            state.customs.listes.push(custom)
        }
    },
    actions:{
        async listCustoms({commit,getters},token){
            try {
                if (!getters.customs.loaded) {
                    const res = await customApi.listCustom(token)
                    commit('SET_CUSTOMS', res.data.data)
                }
                // console.log(getters.customs)
            } catch (err) {
                commit('SET_CUSTOMS', { success: false, code: 401 })
            }
        },
        async updateCustom({commit},data){

            try {
                const res = await customApi.updateCustom(data)
                commit('SET_CUSTOM', res.data.data)
            } catch (e) {

            }
        }
    }
}