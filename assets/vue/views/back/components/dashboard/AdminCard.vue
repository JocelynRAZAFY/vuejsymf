<template>
    <section>
        <mdb-row>
            <mdb-col xl="3" md="6" class="mb-3">
                <mdb-card class="classic-admin-card primary-color">
                    <mdb-card-body>
                        <div class="pull-right">
                            <mdb-icon icon="money"/>
                        </div>
                        <p class="white-text">SALES</p>
                        <h4><strong>$2000</strong></h4>
                    </mdb-card-body>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%"></div>
                    </div>
                    <mdb-card-body>
                        <p>Better than last week (25%)</p>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-3">
                <mdb-card class="classic-admin-card warning-color">
                    <mdb-card-body>
                        <div class="pull-right">
                            <mdb-icon icon="line-chart"/>
                        </div>
                        <p class="white-text">SALES</p>
                        <h4><strong>200</strong></h4>
                    </mdb-card-body>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%"></div>
                    </div>
                    <mdb-card-body>
                        <p>Worse than last week (25%)</p>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-3">
                <mdb-card class="classic-admin-card primary-color">
                    <mdb-card-body>
                        <div class="pull-right">
                            <mdb-icon icon="pie-chart"/>
                        </div>
                        <p class="white-text">TRAFFIC</p>
                        <h4><strong>20000</strong></h4>
                    </mdb-card-body>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar bg grey darken-3" role="progressbar" style="width: 75%"></div>
                    </div>
                    <mdb-card-body>
                        <p>Better than last week (75%)</p>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-3">
                <mdb-card class="classic-admin-card red accent-2">
                    <mdb-card-body>
                        <div class="pull-right">
                            <mdb-icon icon="bar-chart"/>
                        </div>
                        <p class="white-text">ORGANIC TRAFFIC</p>
                        <h4><strong>2000</strong></h4>
                    </mdb-card-body>
                    <div class="progress">
                        <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg grey darken-3" role="progressbar" style="width: 25%"></div>
                    </div>
                    <mdb-card-body>
                        <p>Better than last week (75%)</p>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbIcon } from 'mdbvue'
    export default {
        name: "AdminCard",
        components:{
            mdbRow,
            mdbCol,
            mdbBtn,
            mdbCard,
            mdbCardBody,
            mdbCardHeader,
            mdbCardText,
            mdbIcon,
        }
    }
</script>

<style scoped>
    .classic-admin-card .card-body {
        color: #fff;
        margin-bottom: 0;
        padding: 0.9rem;
    }
    .classic-admin-card .card-body p {
        font-size: 13px;
        opacity: 0.7;
        margin-bottom: 0;
    }
    .classic-admin-card .card-body h4 {
        margin-top: 10px;
    }
</style>