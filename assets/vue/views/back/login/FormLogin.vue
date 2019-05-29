<template>
    <form @submit="login($event)">
        <p class="h4 text-center mb-4">Sign in </p>
        <div class="grey-text">
            <mdb-input v-model="user.email" label="Your email" icon="envelope" type="email"/>
            <mdb-input v-model="user.password" label="Your password" icon="lock" type="password"/>
        </div>
        <div class="text-center">
            <!--<mdb-btn color="deep-orange">Login</mdb-btn>-->
            <b-button block variant="primary" type="submit">Login</b-button>
        </div>
    </form>
</template>

<script>
    import { mdbInput,mdbBtn } from  'mdbvue'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        name: "FormLogin",
        components: {
            mdbInput,
            mdbBtn
        },
        data(){
          return {
              user:{
                  email: 'rt1jocelyn@gmail.com',
                  password: '123'
              },
              token: null
          }
        },
        methods: {
            ...mapActions('user',['loginUser']),
            ...mapGetters('user',['getToken']),
            async login(e){
                e.preventDefault()
                await this.loginUser(this.user)
                if(this.getToken){
                    this.$router.push({path: '/dashboard'})
                }
            },
        }
    }
</script>

<style scoped>

</style>