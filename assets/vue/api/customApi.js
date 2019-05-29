import axiosService from '../services/axiosService'

export default {
    listCustom(token){
        return axiosService.get('/api/back/custom/list',token)
    }
}