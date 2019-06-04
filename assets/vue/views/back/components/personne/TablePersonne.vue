<template>
    <div id="vuetable">
        <!--<img src="../../../../../images/logo.png">-->
        <mdb-col md="12">
            <mdb-card class="mb-4">
                <mdb-card-header>Liste Personne sur Vuetable-2</mdb-card-header>
                <mdb-card-body>
                    <div id="table-wrapper" class="ui container">
                        <my-vuetable @showLineTable="showLineTable"></my-vuetable>
                    </div>
                </mdb-card-body>
            </mdb-card>
        </mdb-col>

        <form-personne :rowData="rowData"></form-personne>
    </div>

</template>

<script>
    import MyVuetable from './MyVuetable'
    import FormPersonne from './FormPersonne'
    import { mdbContainer, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbRow, mdbCol } from "mdbvue";

    export default {
        name: "TablePersonne",
        components: {
            MyVuetable,
            FormPersonne,
            mdbCard,
            mdbCardBody,
            mdbCardHeader,
            mdbRow,
            mdbCol
        },
        data(){
            return {
                rowData: {}
            }
        },
        methods:{
            showLineTable(rowData){
                this.rowData = rowData
            }
        }
    }
</script>

<style scoped>
    #vuetable {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>