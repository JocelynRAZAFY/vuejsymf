import axiosService from '../services/axiosService'

export default {
    lineChart(){
        return axiosService.get('/api/back/chart/line')
    },
    radarChart(){
        return axiosService.get('/api/back/chart/radar')
    },
    doughnutChart(){
        return axiosService.get('/api/back/chart/doughnut')
    }
}