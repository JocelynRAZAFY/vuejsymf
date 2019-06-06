import axiosService from '../services/axiosService'

export default {
    getAllCustomPagination(param){
        return axiosService.post('api/back/custom/pagination',param)
    },
    listCustom(){
        return axiosService.get('/api/back/custom/list')
    },
    updateCustom({param}){
        return axiosService.post('/api/back/custom/update',param)
    }
}