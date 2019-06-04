import customApi from '../api/customApi'

export default {
    namespaced: true,
    state: {
        customs: [],
        custom: {},
        totalRows: 0
    },
    getters:{
        customs (state){
            return state.customs
        },
        custom (state){
            return state.custom
        },
        totalRows (state){
            return state.totalRows
        }
    },
    mutations:{
        'SET_CUSTOMS' (state,data){
            state.customs = data.rows
            state.totalRows = data.totalRows
        },
        'UPDATE_CUSTOM' (state,custom){
            state.customs.forEach(function (cust) {
                if(cust.id == custom.id){
                    cust.title = custom.title
                    cust.content = custom.content
                }
            })
        },
        'SET_CUSTOM' (state, custom){
            state.custom = custom
        },
    },
    actions:{
        async getAllPagination({commit},{firstResult,perPage}){
            try {
                const res = await customApi.getAllCustomPagination({firstResult,perPage})
                commit('SET_CUSTOMS', res.data.data)
            }catch (e) {
                
            }
        },
        async listCustoms({commit,getters}){
            try {
                const res = await customApi.listCustom()
                commit('SET_CUSTOMS', res.data.data)
            } catch (err) {
                commit('SET_CUSTOMS', { success: false, code: 401 })
            }
        },
        async updateCustom({commit,dispatch,state},param){
            try {
                const res = await customApi.updateCustom(param)
                let data = res.data.data
            if(Array.isArray(data)){
                    commit('SET_CUSTOMS', data)
                }else {
                    dispatch('editCustom',data)
                }
            } catch (e) {

            }
        },
        setCustom({commit},custom){
            commit('SET_CUSTOM',custom)
        },
        editCustom({commit},custom){
            commit('UPDATE_CUSTOM',custom)
        }

    }
}