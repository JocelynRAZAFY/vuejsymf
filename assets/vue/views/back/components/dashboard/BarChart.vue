<template>
    <section>
        <mdb-row class="mt-5">
            <mdb-col md="9" class="mb-4">
                <mdb-card>
                    <mdb-card-body>
                        <div style="display: block">
                            <mdb-bar-chart :data="barChartData" :options="barChartOptions" :height="500"/>
                        </div>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col md="3" class="mb-4">
                <mdb-card class="mb-4">
                    <mdb-card-header class="text-center"> Pie chart </mdb-card-header>
                    <mdb-card-body>
                        <div style="display: block">
                            <mdb-pie-chart :data="pieChartData" :options="pieChartOptions" :height="200"/>
                        </div>
                    </mdb-card-body>
                </mdb-card>
                <mdb-card class="mb-4">
                    <mdb-card-body>
                        <mdb-list-group class="list-group-flush">
                            <mdb-list-group-item action waves>Sales
                                <mdb-badge color="success-color" pill class="pull-right">22%
                                    <mdb-icon icon="arrow-up" class="ml-1"/>
                                </mdb-badge>
                            </mdb-list-group-item>
                            <mdb-list-group-item action waves>Traffic
                                <mdb-badge color="danger-color" pill class="pull-right">5%
                                    <mdb-icon icon="arrow-down" class="n ml-1"/>
                                </mdb-badge>
                            </mdb-list-group-item>
                            <mdb-list-group-item action waves>Orders
                                <mdb-badge color="primary-color" pill class="pull-right">14</mdb-badge>
                            </mdb-list-group-item>
                            <mdb-list-group-item action waves>Issues
                                <mdb-badge color="primary-color" pill class="pull-right">123</mdb-badge>
                            </mdb-list-group-item>
                            <mdb-list-group-item action waves>Messages
                                <mdb-badge color="primary-color" pill class="pull-right">8</mdb-badge>
                            </mdb-list-group-item>
                        </mdb-list-group>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody,
        mdbCardHeader, mdbCardText, mdbIcon, mdbBarChart,
        mdbPieChart, mdbListGroup, mdbListGroupItem, mdbBadge } from 'mdbvue'

    export default {
        name: "BarChart",
        components:{
            mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader,
            mdbCardText, mdbIcon, mdbBarChart, mdbPieChart, mdbListGroup,
            mdbListGroupItem, mdbBadge
        },
        data(){
            return {
                barChartData: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            label: '#1',
                            data: [12, 39, 3, 50, 2, 32, 84],
                            backgroundColor: 'rgba(245, 74, 85, 0.5)',
                            borderWidth: 1
                        }, {
                            label: '#2',
                            data: [56, 24, 5, 16, 45, 24, 8],
                            backgroundColor: 'rgba(90, 173, 246, 0.5)',
                            borderWidth: 1
                        }, {
                            label: '#3',
                            data: [12, 25, 54, 3, 15, 44, 3],
                            backgroundColor: 'rgba(245, 192, 50, 0.5)',
                            borderWidth: 1
                        }
                    ]
                },
                barChartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            barPercentage: 1,
                            gridLines: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.1)'
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                },
                pieChartData: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [
                        {
                            data: [300, 50, 100, 40, 120, 24, 52],
                            backgroundColor: ['#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360', '#ac64ad'],
                            hoverBackgroundColor: ['#FF5A5E', '#5AD3D1', '#FFC870', '#A8B3C5', '#616774', '#da92db']
                        }
                    ]
                },
                pieChartOptions: {
                    responsive: true,
                    maintainAspectRatio: false
                },
            }
        }
    }
</script>

<style scoped>

</style>