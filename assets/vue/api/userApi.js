import axiosService from '../services/axiosService'

export default {
    loginUser(params){
        return axiosService.post('/api/user/login',params,null)
    },
    getData(token){
        return axiosService.get('/api/back/user/datas',token)
    }
}