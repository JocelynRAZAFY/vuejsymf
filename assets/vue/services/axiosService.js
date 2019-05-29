import axios from "axios";

export default {
    post(url, params, token = null){
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
    },
    get(url, token){
        const config = {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        }

        return axios.get(url, config)
    }
}