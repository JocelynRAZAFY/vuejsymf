<template>
    <div>
        <mdb-row>
            <mdb-col md="12">
                <mdb-card cascade narrow class="mt-5">
                    <mdb-view class="gradient-card-header blue darken-2">
                        <h4 class="h4-responsive text-white">Famille article</h4>
                    </mdb-view>
                    <mdb-card-body>
                        <div class="row">
                            <div class="col-md-6">
                                <list-famille></list-famille>
                            </div>
                            <div class="col-md-6">
                                <form-famille></form-famille>
                            </div>
                        </div>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
        <mdb-row>
            <mdb-col md="12">
                <mdb-card cascade narrow class="mt-5">
                    <mdb-view class="gradient-card-header blue darken-2">
                        <h4 class="h4-responsive text-white">Article</h4>
                    </mdb-view>
                    <mdb-card-body>

                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </div>
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbView, mdbCardBody, mdbTbl } from 'mdbvue'
    import ListFamille from './ListFamille'
    import FormFamille from './FormFamille'

    export default {
        name: "Articles",
        components:{
            mdbRow,
            mdbCol,
            mdbCard,
            mdbView,
            mdbCardBody,
            mdbTbl,
            ListFamille,
            FormFamille
        }
    }
</script>

<style scoped>
    .card.card-cascade .view.gradient-card-header {
        padding: 1rem 1rem;
        text-align: center;
    }
    .card.card-cascade h3,
    .card.card-cascade h4 {
        margin-bottom: 0;
    }
</style>