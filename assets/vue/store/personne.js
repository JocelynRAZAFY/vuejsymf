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
        'UPDATE_PERSONNE' (state,personne){
            let add = true
            state.personnes.data.forEach(function (perso) {
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
                state.personnes.data.push(personne)
            }

        },
        'SET_PERSONNE' (state, personne){
            state.personne = personne
        }
    },
    actions: {
        async getAllPersonne({commit, state}){
            const resp = await personneAPI.allPersonne()
            commit('SET_PERSONNES',resp.data.data)
        },
        async updatePersonne({commit},{param}){
             const resp = await personneAPI.updatePersonne({param})
            commit('UPDATE_PERSONNE',resp.data.data)
        }
    }
}