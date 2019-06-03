import personneAPI from '../api/personneApi'

export default {
    namespaced: true,
    state: {
        personnes: []
    },
    getters:{
        personnes(state){
            return state.personnes
        }
    },
    mutations: {
        'SET_PERSONNES' (state, personnes){
            state.personnes = personnes
        },
        'UPDATE_PERSONNE' (state, personne){
            let add = true
            state.personnes.forEach(function (perso) {
                if(perso.id == personne.id){
                    add = false
                    perso.lastName = personne.lastName
                    perso.firstName = personne.firstName
                    perso.adress = personne.adress
                    perso.registrationNumber = personne.registrationNumber
                    perso.tel = personne.tel
                    perso.birthday = personne.birthday
                }
            })

            if(add){
                state.personnes.push(personne)
            }
        },
        'SET_PERSONNE' (state, personne){
            state.personne = personne
        }
    },
    actions: {
        async getAllPersonne({commit, state},token){
            const resp = await personneAPI.allPersonne(token)
            commit('SET_PERSONNES',resp.data.data)
        },
        async updatePersonne({commit},{param,token}){
             const resp = await personneAPI.updatePersonne({param,token})
            commit('UPDATE_PERSONNE',resp.data.data)
        }
    }
}