import FamilleAPI from '../api/familleApi'

export default {
    namespaced: true,
    state: {
        familles: []
    },
    getters: {
        familles(state){
            return state.familles
        }
    },
    mutations:{
        'SET_FAMILLES' (state,familles){
            state.familles = familles
        }
    },
    actions:{
        async updateFamilles({commit},param){
            const res = await FamilleAPI.updateFamille(param)
            commit('SET_FAMILLES',res.data.data)
        }
    }
}