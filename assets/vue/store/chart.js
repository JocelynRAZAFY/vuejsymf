import ChartAPI from '../api/chartApi'

export default {
    namespaced: true,
    state: {
        linechart: {},
        radarchart: {},
        doughnutchart: {}
    },
    getters:{
        lineChart (state){
            return state.linechart
        },
        radarChart (state){
            return state.radarchart
        },
        doughnutChart (state){
            return state.doughnutchart
        }
    },
    mutations:{
        'SET_LINE_CHART' (state, linechart){
            state.linechart = linechart
        },
        'SET_RADAR_CHART' (state, radarchart){
            state.radarchart = radarchart
        },
        'SET_DOUGHNUT_CHART' (state, doughnutchart){
            state.doughnutchart = doughnutchart
        }
    },
    actions:{
        async getLineChart({commit}){
             const res = await ChartAPI.lineChart()
            commit('SET_LINE_CHART', res.data.data)
        },
        async getRadarChart({commit}){
            const res = await ChartAPI.radarChart()
            commit('SET_RADAR_CHART', res.data.data)
        },
        async getDoughnutChart({commit}){
            const res = await ChartAPI.doughnutChart()
            commit('SET_DOUGHNUT_CHART', res.data.data)
        }
    }
}