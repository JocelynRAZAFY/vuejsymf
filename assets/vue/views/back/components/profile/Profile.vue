<template>
  <section id="profile">
    <mdb-row>
      <!--<card-profile></card-profile>-->
      <dynamic-profile></dynamic-profile>
    </mdb-row>
  </section>
</template>

<script>
import { mdbRow } from 'mdbvue'
import WebSocket from '../../../../services/websocket'
import CardProfile from './CardProfile'
import DynamicProfile from './DynamicProfile'

export default {
  name: 'Profile',
  components: {
    mdbRow,
    CardProfile,
    DynamicProfile
  },
  data () {
    return {
        user: {
            id: '2',
            username: 'Onjamalala',
            email: 'r_onjamalala@gmail.com'
        }
    }
  },
  computed:{

    },
  methods: {
    goToDashboard(){
      this.$router.push('/dashboard')
    },
    logOut(){
      localStorage.removeItem('userToken')
      this.$store.commit('user/SET_LOGOUT')
    },
    sendDataUser(){
        let param = {
            type: 'add',
            user: this.$data.user
        }
          WebSocket.sendMessage(param)
      }
  }
}
</script>

<style scoped>
.profile-card-footer {
  background-color: #F7F7F7 !important;
  padding: 1.25rem;
}
.card.card-cascade .view {
  box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.15), 0 3px 12px 0 rgba(0, 0, 0, 0.15);
}
</style>
