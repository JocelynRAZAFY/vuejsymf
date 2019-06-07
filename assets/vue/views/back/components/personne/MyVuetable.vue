<template>
    <div>
        <vuetable ref="vuetable"
                  :api-mode="false"
                  :data-manager="dataManager"
                  :fields="fields"
                  :sort-order="sortOrder"
                  :css="css.table"
                  pagination-path="pagination"
                  @vuetable:pagination-data="onPaginationData"
                  @vuetable:loading="onLoading"
                  @vuetable:loaded="onLoaded"
        >

            <template slot="actions" slot-scope="props">
                <div class="table-button-container">
                    <button class="btn btn-warning px-3" @click="editRow(props.rowData)" aria-hidden="true">
                        <i class="far fa-edit"></i>
                    </button>&nbsp;&nbsp;
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
    import _ from "lodash";

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
                perPage: 3,
                data: [],
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
                perso: {},

            }
        },
        computed: {
            ...mapGetters('personne',['personnes']),
            localData(){
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
                this.getAllPersonne()
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            editRow(rowData){
                this.$emit('showLineTable',rowData)
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
            dataManager(sortOrder, pagination) {
                if (this.data.length < 1) return;

                let local = this.data;

                // sortOrder can be empty, so we have to check for that as well
                if (sortOrder.length > 0) {
                    console.log("orderBy:", sortOrder[0].sortField, sortOrder[0].direction);
                    local = _.orderBy(
                        local,
                        sortOrder[0].sortField,
                        sortOrder[0].direction
                    );
                }

                pagination = this.$refs.vuetable.makePagination(
                    local.length,
                    this.perPage
                );
                console.log('pagination:', pagination)
                let from = pagination.from - 1;
                let to = from + this.perPage;

                return {
                    pagination: pagination,
                    data: _.slice(local, from, to)
                };
            }
        },
        watch:{
            localData(resp){
                this.data = resp.data
            },
            data(newVal, oldVal) {
                this.$refs.vuetable.refresh();
            }
        }
    }

</script>

<style scoped>

</style>