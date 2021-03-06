import axiosService from '../services/axiosService'

export default {
    updateFamille(param){
        return axiosService.post('/api/back/famille/update',param)
    },
    getAllFamille(param){
        return axiosService.get('/api/back/famille/all')
    },
    searchFamille(param){
        return axiosService.post('/api/back/famille/search',param)
    },
    removeFamille(param){
        return axiosService.post('/api/back/famille/remove',param)
    }
}