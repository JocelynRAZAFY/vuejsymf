<template>
    <div class="list-group">
        <router-link :to="{name: 'FormCustom', params: {id: custom.id}}"
                     v-for="custom in allCustom"
                     :key="custom.id">

            <a href="#!"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-2 h5">{{ custom.title }}</h5>
                    <small>{{ ago(custom) }}</small>
                </div>
                <p class="mb-4">{{ custom.content }}</p>
                <small>{{ custom.user.username }}</small>
            </a>
        </router-link>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapState} from 'vuex'
    import moment from 'moment'
    moment.locale('fr');

    export default {
        name: "ListCustom",
        computed:{
            ...mapGetters('user',['getToken']),
            ...mapGetters('custom',['customs']),
            // ...mapState('custom',['customs']),
            allCustom(){
                return this.customs.listes
            }
        },
        mounted(){
            this.getListCustom()
        },
        created(){
            if(this.customs.code === 401){
                this.tokenExpire()
            }
        },
        methods:{
            ...mapActions('custom',['listCustoms']),
            ...mapActions('user',['logOut']),
            async getListCustom(){
                await this.listCustoms(this.getToken)
            },
            ago (custom) {
                return moment(custom.created.date).fromNow()
            },
            tokenExpire(){
                this.logOut()
            }
        }

    }
</script>

<style scoped>
    div a{
        text-decoration: none;
    }
</style>