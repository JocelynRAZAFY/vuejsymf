<template>
    <mdb-card class="mb-4">
        <mdb-card-header> Radar chart </mdb-card-header>
        <mdb-card-body>
            <div style="display: block">
                <mdb-radar-chart :data="radarChart.radarChartData" :options="radarChart.radarChartOptions" :height="300"/>
            </div>
        </mdb-card-body>
    </mdb-card>
</template>

<script>
    import { mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbRadarChart} from 'mdbvue'
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "RadarChart",
        components:{
            mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbRadarChart
        }
        ,
        data(){
            return {
                radarChartData: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: '#1',
                            backgroundColor: 'rgba(245, 74, 85, 0.5)',
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: '#2',
                            backgroundColor: 'rgba(90, 173, 246, 0.5)',
                            data: [12, 42, 121, 56, 24, 12, 2]
                        },
                        {
                            label: '#3',
                            backgroundColor: 'rgba(245, 192, 50, 0.5)',
                            data: [2, 123, 154, 76, 54, 23, 5]
                        }
                    ]
                },
                radarChartOptions: {
                    responsive: true,
                    maintainAspectRatio: false
                },
            }
        },
        computed:{
          ...mapGetters('chart',['radarChart'])
        },
        created(){
            this.getRadarChart()
        },
        methods:{
            ...mapActions('chart',['getRadarChart'])
        }
    }
</script>

<style scoped>

</style>