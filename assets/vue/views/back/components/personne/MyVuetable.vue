<template>
    <div>
        <!--api-url="https://vuetable.ratiw.net/api/users"-->
        <vuetable ref="vuetable"
                  api-url="http://127.0.0.1:8000/api/back/personne/all"
                  :fields="fields"
                  :sort-order="sortOrder"
                  :css="css.table"
                  pagination-path=""
                  :per-page="3"
                  @vuetable:pagination-data="onPaginationData"
                  @vuetable:loading="onLoading"
                  @vuetable:loaded="onLoaded"
                  :http-options="httpOptions"
        >

            <template slot="actions" slot-scope="props">
                <div class="table-button-container">
                    <button class="btn btn-warning btn-sm" @click="editRow(props.rowData)">
                        <span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" @click="deleteRow(props.rowData)">
                        <span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp;&nbsp;
                </div>
            </template>

        </vuetable>
        <vuetable-pagination ref="pagination"
                             :css="css.pagination"
                             @vuetable-pagination:change-page="onChangePage"
        ></vuetable-pagination>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import { mapGetters } from 'vuex'

    export default
    {
        name: "MyVuetable",
        components: {
            Vuetable,
            VuetablePagination
        },
        data(){
            return {
                fields: [
                    {
                        name: 'lastName',
                        title: '<span class="orange glyphicon glyphicon-user"></span> Last Name',
                        sortField: 'lastName'
                    },
                    {
                        name: 'firstName',
                        title: 'First Name',
                        sortField: 'firstName'
                    },
                    'birthday',
                    {
                        name: 'registrationNumber',
                        title: 'Registration',
                        sortField: 'registrationNumber'
                    },
                    'actions'
                ],
                sortOrder: [
                    { field: 'lastName', direction: 'asc' }
                ],
                css: {
                    table: {
                        tableClass: 'table table-striped table-bordered table-hovered',
                        loadingClass: 'loading',
                        ascendingIcon: 'glyphicon glyphicon-chevron-up',
                        descendingIcon: 'glyphicon glyphicon-chevron-down',
                        handleIcon: 'glyphicon glyphicon-menu-hamburger',
                    },
                    pagination: {
                        infoClass: 'pull-left',
                        wrapperClass: 'ui right floated pagination menu',
                        activeClass: 'btn btn-warning',
                        disabledClass: 'disabled',
                        pageClass: 'btn btn-primary',
                        linkClass: 'btn btn-primary',
                        icons: {
                            first: '',
                            prev: '',
                            next: '',
                            last: '',
                        },
                    }
                }
            }
        },
        computed: {
            ...mapGetters('user',['getToken']),
            httpOptions() {
                return {headers: {'Authorization': this.getToken}} //table props -> :http-options="httpOptions"
            },
        },
        methods:{
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            editRow(rowData){
                alert("You clicked edit on"+ JSON.stringify(rowData))
            },
            deleteRow(rowData){
                alert("You clicked delete on"+ JSON.stringify(rowData))
            },
            onLoading() {
                console.log('loading... show your spinner here')
            },
            onLoaded() {
                console.log('loaded! .. hide your spinner here')
            }
        }
    }

</script>

<style scoped>

</style>