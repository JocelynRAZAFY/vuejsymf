import axiosService from '../services/axiosService'

export default {
    updatePersonne({param}){
        let url;

        if(param.id === 0){
            url = '/api/back/personne/add'
        }else {
            url = '/api/back/personne/edit'
        }
        return axiosService.post(url,param,token)
    },
    allPersonne()
    {
        return axiosService.get('/api/back/personne/all')
    }
}