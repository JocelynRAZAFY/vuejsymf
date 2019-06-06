<template>
    <mdb-card class="mb-4">
        <mdb-card-header> Doughnut chart </mdb-card-header>
        <mdb-card-body>
            <div style="display: block">
                <mdb-doughnut-chart :data="doughnutChart.doughnutChartData" :options="doughnutChart.doughnutChartOptions" :height="300"/>
            </div>
        </mdb-card-body>
    </mdb-card>
</template>

<script>
    import { mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbDoughnutChart} from 'mdbvue'
    import { mapActions, mapGetters} from 'vuex'

    export default {
        name: "DoughnutChart",
        components:{
            mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbDoughnutChart
        },
        data(){
            return {

            }
        },
        computed:{
            ...mapGetters('chart',['doughnutChart'])
        },
        created() {
            this.getDoughnutChart()
        },
        methods:{
            ...mapActions('chart',['getDoughnutChart'])
        }
    }
</script>

<style scoped>

</style>