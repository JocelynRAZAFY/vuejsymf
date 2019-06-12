import FamilleAPI from '../api/familleApi'

export default {
    namespaced: true,
    state: {
        familles: [],
        famille: {},
        totalRows: 0,
        search: null,
        status: false
    },
    getters: {
        familles(state){
            return state.familles
        },
        famille(state){
            return state.famille
        },
        totalRows(state){
            return state.totalRows
        },
        search(state){
            return state.search
        }
    },
    mutations:{
        'SET_FAMILLES' (state,data){
            state.familles = data.rows
            state.totalRows = data.totalRows
        },
        'UPDATE_FAMILLE' (state,famille){
            var add = true
            // const resultat = state.familles.find( fam => fam.id === famille.id);
            // console.log(resultat)
            state.familles.forEach(function (item) {
                if(item.id == famille.id){
                    add = false
                    item.photo = famille.photo
                    item.label = famille.label
                }
            })
        },
        'SET_FAMILLE' (state,famille){
            state.famille = famille
        },
        'SET_SEARCH' (state,search){
            state.search = search
        },


    },
    actions:{
        async updateFamilles({commit, dispatch},param){
            try {
                const res = await FamilleAPI.updateFamille(param)

                if(res.data.data.action != 'add'){
                    commit('UPDATE_FAMILLE',res.data.data.famille)
                }else{
                    dispatch('searchFamille',{firstResult: 1,perPage: 3,search: null})
                }

            }catch (e) {

            }
        },
        async getAllFamille({commit},{firstResult,perPage}){
            try {
                const res = await FamilleAPI.getAllFamille({firstResult,perPage})
                commit('SET_FAMILLES',res.data.data)
            }catch (e) {

            }
        },
        async searchFamille({commit, state},{firstResult,perPage,search}){
            try {
                const res = await FamilleAPI.searchFamille({firstResult,perPage,search})
                commit('SET_FAMILLES',res.data.data)
                commit('SET_SEARCH',search)
            }catch (e) {

            }
        },
        async removeFamille({commit, dispatch, state},{id}){
            try {
                const res = await FamilleAPI.removeFamille({id})
                dispatch('searchFamille',{firstResult: 1,perPage: 3,search: state.search})
            }catch (e) {

            }

        }
    }
}