<template>
    <div>
        <div class="list-group">
            <!--<router-link :to="{name: 'FormCustom', params: {id: custom.id}}"-->
            <!--v-for="custom in allCustom"-->
            <!--:key="custom.id">-->

            <!--<a href="#!"-->
            <!--class="list-group-item list-group-item-action flex-column align-items-start">-->
            <!--<div class="d-flex w-100 justify-content-between">-->
            <!--<h5 class="mb-2 h5">{{ custom.title }}</h5>-->
            <!--<small>{{ ago(custom) }}</small>-->
            <!--</div>-->
            <!--<p class="mb-4">{{ custom.content }}</p>-->
            <!--<small>{{ custom.user.username }}</small>-->
            <!--</a>-->
            <!--</router-link>-->
            <a href="javascript:void(0)"
               v-for="custom in allCustom"
               :key="custom.id"
               @click="detailCustom(custom)"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-2 h5">{{ custom.title }}</h5>
                    <small>{{ ago(custom) }}</small>
                </div>
                <p class="mb-4">{{ custom.content }}</p>
                <small>{{ custom.user.username }}</small>
            </a>
        </div>
        <div class="overflow-auto">
            <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
            ></b-pagination>

            <p class="mt-3">Current Page: {{ currentPage }}</p>

        </div>
    </div>

</template>

<script>
    import {mapActions, mapGetters, mapState} from 'vuex'
    import moment from 'moment'
    moment.locale('fr');
    import Paginate from 'vuejs-paginate'

    export default {
        name: "ListCustom",
        components:{
            Paginate
        },
        data(){
            return {
                perPage: 3,
                currentPage: 1
            }
        },
        computed:{
            ...mapGetters('user',['getToken']),
            ...mapGetters('custom',['customs','totalRows']),
            allCustom(){
                return this.customs
            },
            rows() {
                console.log(this.totalRows)
                return this.totalRows
            }
        },
        mounted(){
            this.getListCustom(1,3)
        },
        created(){
            if(this.customs.code === 401){
                this.tokenExpire()
            }
        },
        methods:{
            ...mapActions('custom',['listCustoms','setCustom','getAllPagination']),
            ...mapActions('user',['logOut']),
            async getListCustom(firstResult,perPage){
                // await this.listCustoms()
                await this.getAllPagination({firstResult: firstResult, perPage: perPage})
            },
            ago (custom) {
                return moment(custom.created.date).fromNow()
            },
            tokenExpire(){
                this.logOut()
            },
            detailCustom(custom){
                this.setCustom(custom)
            },
            clickCallback(pageNum){
                console.log(pageNum)
            }
        },
        watch:{
            async currentPage(page){
               await this.getAllPagination({firstResult: page, perPage: this.perPage})
            }
        }

    }
</script>

<style scoped>
    div a{
        text-decoration: none;
    }
    .list-group a{
        cursor: pointer;
    }
    .pagination {

    }
    .page-item {
        padding: 10px;
    }
    .overflow-auto{
        margin-top: 1em;
    }
</style>