import FamilleAPI from '../api/familleApi'

export default {
    namespaced: true,
    state: {
        familles: [],
        famille: {}
    },
    getters: {
        familles(state){
            return state.familles
        },
        famille(state){
            return state.famille
        }
    },
    mutations:{
        'SET_FAMILLES' (state,familles){
            state.familles = familles
        },
        'UPDATE_FAMILLE' (state,famille){

            var add = true
            state.familles.forEach(function (item) {
                if(item.id == famille.id){
                    add = false
                    item.photo = famille.photo
                    item.label = famille.label
                }
            })

            if(add){
                state.familles.push(famille)
            }

        },
        'SET_FAMILLE' (state,famille){
            state.famille = famille
        }

    },
    actions:{
        async updateFamilles({commit},param){
            const res = await FamilleAPI.updateFamille(param)

            commit('UPDATE_FAMILLE',res.data.data)
        },
        async getAllFamille({commit}){
            const res = await FamilleAPI.getAllFamille()
            commit('SET_FAMILLES',res.data.data)
        },

    }
}