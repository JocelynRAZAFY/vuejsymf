import axiosService from '../services/axiosService'

export default {
    updatePersonne({param}){
        return axiosService.post('/api/back/personne/update',param)
    },
    allPersonne()
    {
        return axiosService.get('/api/back/personne/all')
    }
}