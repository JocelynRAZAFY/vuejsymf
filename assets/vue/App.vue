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
            hasToken(){
                const token = localStorage.getItem('userToken')
                this.$store.commit('user/SET_TOKEN',token)
                return this.$store.getters['user/getToken']
            },
            getInformation(){
                let user = this.$store.getters['user/user']
                // console.log(user)
                if(user.id !== null && user.id !== undefined){
                    this.$notify({
                        group: 'foo',
                        title: this.$store.getters['websocket/messageReceived'],
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

            }
        },
        beforeMount () {

        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
