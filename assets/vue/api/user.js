import axios from 'axios'

const postApi = function(url, params, token = null){
    var config;

    if(token){
        config = {
            headers: {
                'Content-Type': 'application/ld+json',
                'Authorization': 'Bearer ' + token
            }
        }
    }else {
        config = {
            headers: {
                'Content-Type': 'application/ld+json'
            }
        }
    }

    return axios.post('/api/user/login', params, config)
};

const getApi = function(url, token){
    var config;

    config = {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    }
    return axios.get(url, config)
};

export default {
    loginUser(params){

        return postApi('/api/user/login',params)
        // const config = {
        //     headers: {
        //         'Content-Type': 'application/ld+json'
        //     }
        // }
        //
        // return axios.post('/api/user/login', params, config)
    },
    getData(token){

        return getApi('/api/back/user/datas',token)
        // const config = {
        //     headers: {
        //         'Authorization': 'Bearer ' + token
        //     }
        // }
        // return axios.get('/api/back/user/datas', config)
    }
}