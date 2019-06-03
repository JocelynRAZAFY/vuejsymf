import axiosService from '../services/axiosService'

export default {
    addPersonne({param,token}){
        return axiosService.post('/api/back/personne/add',param,token)
    },
    editPersonne({param,token}){
        return axiosService.post('/api/back/personne/edit',param,token)
    },
    allPersonne(token)
    {
        return axiosService.get('/api/back/personne/edit',token)
    }
}