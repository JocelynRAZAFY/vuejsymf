<template>
    <mdb-card class="mb-4">
        <mdb-card-body class="d-sm-flex justify-content-between">
            <h4 class="mb-sm-0 pt-2">
                <a href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">Home Page</a><span>/</span><span>Dashboard</span>
            </h4>
            <form class="d-flex md-form justify-content-center" style="margin:0;">
                <input aria-label="Search" class="form-control" placeholder="Type your query" type="search" />
                <mdb-btn color="primary" size="sm" class="my-0" type="submit"><i class="fa fa-search"></i></mdb-btn>
            </form>
        </mdb-card-body>
    </mdb-card>
</template>

<script>
    import {mdbCard, mdbCardBody, mdbBtn} from 'mdbvue'
    export default {
        name: "SearchDashboard",
        components:{
            mdbCard, mdbCardBody, mdbBtn
        }
    }
</script>

<style scoped>

</style>