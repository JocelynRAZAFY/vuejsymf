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
                        <i class="fas fa-edit"></i>
                    </button>&nbsp;&nbsp;
                    <button class="btn btn-danger px-3" @click="deleteRow(props.rowData)" aria-hidden="true">
                        <i class="fas fa-trash-alt"></i>
                    </button>&nbsp;&nbsp;
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

    export default {
        name: "ListeArticle",
        components:{
            Vuetable,
            VuetablePagination
        },
        data(){
            return {
                fields: [
                    {
                        name: 'code',
                        title: '<span class="fas fa-barcode"></span> Code',
                        sortField: 'code'
                    },
                    {
                        name: 'label',
                        title: '<span class="fas fa-tag"></span> Label',
                        sortField: 'label'
                    },
                    {
                        name: 'description',
                        title: '<span class="fas fa-asterisk"></span> Description',
                        sortField: 'description'
                    },
                    {
                        name: 'qteIni',
                        title: '<span class="fab fa-docker"></span> QteIni',
                        sortField: 'qteIni'
                    },
                    {
                        name: 'qte',
                        title: '<span class="fab fa-docker"></span> Qte',
                        sortField: 'qte'
                    },
                    {
                        name: 'price',
                        title: '<span class="fas fa-money-bill-alt"></span> Price',
                        sortField: 'price'
                    },
                    {
                        name: 'photo',
                        title: '<span class="fas fa-money-bill-alt"></span> Photo',
                        sortField: 'photo'
                    }
                ],
                sortOrder: [
                    { field: 'code', direction: 'asc' }
                ],
                css: {
                    table: {
                        tableClass: 'table table-striped table-bordered table-hovered',
                        loadingClass: 'loading',
                        ascendingIcon: 'fas fa-chevron-up',
                        descendingIcon: 'fas fa-chevron-down',
                        handleIcon: 'fas fa-bars',
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
                data: [],
            }
        },
        computed:{
            ...mapGetters('article',['articles']),
            localData(){
                return this.articles
            }
        },
        created(){
            this.getAllArticle()
        },
        methods:{
            ...mapActions('article',['searchArticle']),
            getAllArticle(){
                this.searchArticle({firstResult: 1,perPage:50,search: null})
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