<template>
    <div>
        <div v-if="hasToken">
            {{ getInformation }}
            <app-back></app-back>
        </div>
        <div v-else>
            <login></login>
        </div>
    </div>
</template>

<script>

    import Login from './views/back/login/Login'
    import AppBack from './views/back/components/AppBack'
    import { mapState, mapActions, mapGetters } from 'vuex';

    export default {
        name: 'app',
        components: {
            Login,
            AppBack
        },
        data () {
            return {

            }
        },
        created() {

        },
        computed: {
            ...mapGetters('user',['getToken','user']),
            ...mapGetters('websocket',['messageReceived']),
            hasToken(){
                const token = this.getToken
                this.$store.commit('user/SET_TOKEN',token)
                return token
            },
            getInformation(){
                let user = this.user
                if(user.id !== null && user.id !== undefined && this.messageReceived != null){
                    this.$notify({
                        group: 'foo',
                        title: this.messageReceived,
                        text: user.id+'-'+user.username+'-'+user.email,
                        duration: 10000,
                        speed: 1000
                    });
                }

                let param = {
                    id: null,
                    username: '',
                    email: ''
                }
                this.$store.commit('user/SET_TEST',param)
                this.$store.commit('websocket/SET_MESSAGE_RECEIVED', null)
            }
        },
        beforeMount () {

        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
