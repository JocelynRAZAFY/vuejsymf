import axios from "axios";

export default {
    post(url,params){
        var config;
        var token = localStorage.getItem('userToken');

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
        var token = localStorage.getItem('userToken');
        const config = {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        }

        return axios.get(url, config)
    }
}