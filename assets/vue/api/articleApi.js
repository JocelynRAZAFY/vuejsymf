import axiosService from '../services/axiosService'

export default {
    updateArticle(param){
        return axiosService.post('/api/back/article/update',param)
    },
    searchArticle(param){
        return axiosService.post('/api/back/article/search',param)
    },
}