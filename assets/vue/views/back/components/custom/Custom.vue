<template>

    <div class="row">
        <div class="col-md-6">
            <div class="list-group">
                <a href="#!"
                   class="list-group-item list-group-item-action flex-column align-items-start active"
                    v-for="custon in allCustom">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-2 h5">List group item heading</h5>
                        <small>3 days ago</small>
                    </div>
                    <p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
                        blandit.</p>
                    <small>Donec id elit non mi porta.</small>
                </a>
                <!--<a href="#!" class="list-group-item list-group-item-action flex-column align-items-start">-->
                    <!--<div class="d-flex w-100 justify-content-between">-->
                        <!--<h5 class="mb-2 h5">List group item heading</h5>-->
                        <!--<small class="text-muted">3 days ago</small>-->
                    <!--</div>-->
                    <!--<p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius-->
                        <!--blandit.</p>-->
                    <!--<small class="text-muted">Donec id elit non mi porta.</small>-->
                <!--</a>-->
                <!--<a href="#!" class="list-group-item list-group-item-action flex-column align-items-start">-->
                    <!--<div class="d-flex w-100 justify-content-between">-->
                        <!--<h5 class="mb-2 h5">List group item heading</h5>-->
                        <!--<small class="text-muted">3 days ago</small>-->
                    <!--</div>-->
                    <!--<p class="mb-2">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius-->
                        <!--blandit.</p>-->
                    <!--<small class="text-muted">Donec id elit non mi porta.</small>-->
                <!--</a>-->
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>

</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    export default {
        name: "Custom",
        computed:{
            ...mapActions('custom',['listCustoms']),
            ...mapGetters('custom',['customs']),
            ...mapGetters('user',['getToken']),
            allCustom(){
                this.listCustoms(this.getToken)
            }
        },
        created(){
            // console.log(this.customs)
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>