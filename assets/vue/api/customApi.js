import axiosService from '../services/axiosService'

export default {
    listCustom(token){
        return axiosService.get('/api/back/custom/list',token)
    },
    updateCustom({param,token}){
        return axiosService.post('/api/back/custom/edit',param,token)
    }
}