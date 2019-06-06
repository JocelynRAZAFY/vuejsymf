<template>
    <mdb-card class="mb-4">
        <mdb-card-header> Line chart </mdb-card-header>
        <mdb-card-body>
            <div style="display: block">
                <mdb-line-chart :data="lineChart.lineChartData" :options="lineChart.lineChartOptions" :height="200"/>
            </div>
        </mdb-card-body>
    </mdb-card>
</template>

<script>
    import { mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbLineChart} from 'mdbvue'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: "LineChart",
        components:{
            mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbLineChart
        },
        data(){
            return {

            }
        },
        computed:{
            ...mapGetters('chart',['lineChart'])
        },
        created(){
            this.getLineChart()
        },
        methods:{
            ...mapActions('chart', ['getLineChart']),
        }
    }
</script>

<style scoped>

</style>