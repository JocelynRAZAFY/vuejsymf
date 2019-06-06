<template>
    <section class="mt-lg-5">
        <mdb-row>
            <mdb-col xl="3" md="6" class="mb-r">
                <mdb-card cascade class="cascading-admin-card">
                    <div class="admin-up">
                        <mdb-icon icon="money-bill-alt" far class="primary-color"/>
                        <div class="data">
                            <p>SALES</p>
                            <h4>
                                <strong>$2000</strong>
                            </h4>
                        </div>
                    </div>
                    <mdb-card-body>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-primary" role="progressbar"
                                 style="width: 25%"></div>
                        </div>
                        <mdb-card-text>Better than last week (25%)</mdb-card-text>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-r">
                <mdb-card cascade class="cascading-admin-card">
                    <div class="admin-up">
                        <mdb-icon icon="line-chart" class="warning-color"/>
                        <div class="data">
                            <p>SUBSCRIPTIONS</p>
                            <h4>
                                <strong>200</strong>
                            </h4>
                        </div>
                    </div>
                    <mdb-card-body>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg grey darken-2" role="progressbar"
                                 style="width: 25%"></div>
                        </div>
                        <mdb-card-text>Worse than last week (25%)</mdb-card-text>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-r">
                <mdb-card cascade class="cascading-admin-card">
                    <div class="admin-up">
                        <mdb-icon icon="pie-chart" class="light-blue lighten-1"/>
                        <div class="data">
                            <p>TRAFFIC</p>
                            <h4>
                                <strong>20000</strong>
                            </h4>
                        </div>
                    </div>
                    <mdb-card-body>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" class="progress-bar grey darken-2" role="progressbar"
                                 style="width: 75%"></div>
                        </div>
                        <mdb-card-text>Worse than last week (75%)</mdb-card-text>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col xl="3" md="6" class="mb-r">
                <mdb-card cascade class="cascading-admin-card">
                    <div class="admin-up">
                        <mdb-icon icon="bar-chart" class="red accent-2"/>
                        <div class="data">
                            <p>ORGANIC TRAFFIC</p>
                            <h4>
                                <strong>2000</strong>
                            </h4>
                        </div>
                    </div>
                    <mdb-card-body>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar bg-primary" role="progressbar"
                                 style="width: 25%"></div>
                        </div>
                        <mdb-card-text>Better than last week (25%)</mdb-card-text>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbIcon } from 'mdbvue'
    export default {
        name: "CascadingAdminCard",
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
    .cascading-admin-card {
        margin: 20px 0;
    }
    .cascading-admin-card .admin-up {
        margin-left: 4%;
        margin-right: 4%;
        margin-top: -20px;
    }
    .cascading-admin-card .admin-up .fas,
    .cascading-admin-card .admin-up .far {
        box-shadow: 0 2px 9px 0 rgba(0, 0, 0, 0.2), 0 2px 13px 0 rgba(0, 0, 0, 0.19);
        padding: 1.7rem;
        font-size: 2rem;
        color: #fff;
        text-align: left;
        margin-right: 1rem;
        border-radius: 3px;
    }
    .cascading-admin-card .admin-up .data {
        float: right;
        margin-top: 2rem;
        text-align: right;
    }
    .admin-up .data p {
        color: #999999;
        font-size: 12px;
    }
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