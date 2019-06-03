<template>
    <div>
        <!--api-url="https://vuetable.ratiw.net/api/users"-->
        <vuetable ref="vuetable"
                  :api-mode="false"
                  :data="localData"
                  :fields="fields"
                  :sort-order="sortOrder"
                  :css="css.table"
                  pagination-path=""
                  :per-page="3"
                  @vuetable:pagination-data="onPaginationData"
                  @vuetable:loading="onLoading"
                  @vuetable:loaded="onLoaded"
        >

            <template slot="actions" slot-scope="props">
                <div class="table-button-container">
                    <button class="btn btn-warning px-3" @click="editRow(props.rowData)" aria-hidden="true">
                        <i class="far fa-edit"></i></button>&nbsp;&nbsp;
                    <button class="btn btn-danger px-3" @click="deleteRow(props.rowData)" aria-hidden="true">
                        <i class="far fa-trash-alt"></i></button>&nbsp;&nbsp;
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
    import { mapGetters, mapActions, mapState } from 'vuex'


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
                },
                perso: {}
            }
        },
        computed: {
            ...mapGetters('personne',['personnes']),
            localData(){
                console.log(this.personnes)
                return this.personnes
            }
        },
        created(){
            this.getPersonne()
        },
        methods:{
            ...mapActions('personne',['getAllPersonne']),
            ...mapGetters('user',['getToken']),
            getPersonne(){
                this.getAllPersonne(this.getToken())
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            editRow(rowData){
                this.$emit('showLineTable',rowData)
                // this.perso.id = rowData.id
                // this.perso.firstName = rowData.firstName
                // this.perso.lastName = rowData.lastName
                // this.perso.registration = rowData.registration
                // this.perso.birtday = rowData.birtday
                // this.perso.adress = rowData.adress
                // this.perso.tel = rowData.tel

                    // alert("You clicked edit on"+ JSON.stringify(rowData))
            },
            deleteRow(rowData){
                alert("You clicked delete on"+ JSON.stringify(rowData))
            },
            onLoading() {
                console.log('loading... show your spinner here')
            },
            onLoaded() {
                console.log('loaded! .. hide your spinner here')
            },
            setPerso(){

            }
        }
    }

</script>

<style scoped>

</style>