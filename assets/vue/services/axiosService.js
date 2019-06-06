var getToken = function () {
    return localStorage.getItem('userToken')
}

import axios from "axios";

export default {
    post(url,params){
        var config;
        var token = getToken()

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

        return axios.post(url, params, config)
    },
    get(url){
        var token = getToken()
        const config = {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        }

        return axios.get(url, config)
    }
}