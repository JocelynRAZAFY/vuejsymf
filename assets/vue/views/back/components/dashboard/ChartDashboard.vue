<template>
    <section>
        <mdb-row class="mt-3">
            <mdb-col md="12" lg="4" class="mb-4">
                <line-chart></line-chart>
            </mdb-col>
            <mdb-col md="12" lg="4" class="mb-4">
                <radar-chart></radar-chart>
            </mdb-col>
            <mdb-col md="12" lg="4" class="mb-4">
                <doughnut-chart></doughnut-chart>
            </mdb-col>
        </mdb-row>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbCardBody, mdbTbl,
        mdbBtn, mdbCardHeader, mdbCardText, mdbIcon
        } from 'mdbvue'
    import LineChart from './LineChart'
    import RadarChart from './RadarChart'
    import DoughnutChart from './DoughnutChart'
    export default {
        name: "ChartDashboard",
        components:{
            mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody,
            mdbCardHeader, mdbCardText, mdbIcon, mdbTbl,
            mdbBtn, mdbCardHeader, mdbCardText, mdbIcon,
            LineChart, RadarChart, DoughnutChart
        },
        data(){
            return {

            }
        }
    }
</script>

<style scoped>

</style>