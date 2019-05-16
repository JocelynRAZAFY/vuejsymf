import axios from 'axios'

export default {
    loginUser(params){
        const config = {
            headers: {
                'Content-Type': 'application/ld+json'
            }
        }

        return axios.post('/api/user/login', params, config)
    },
    getData(token){
        const config = {
            headers: {
                'Authorization': 'Bearer ' + token
            }
        }
        return axios.get('/api/back/user/datas', config)
    }
}