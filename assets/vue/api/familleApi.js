import axiosService from '../services/axiosService'

export default {
    updateFamille(param){
        return axiosService.post('/api/back/famille/update',param)
    },
    getAllFamille(){
        return axiosService.get('/api/back/famille/all')
    }
}