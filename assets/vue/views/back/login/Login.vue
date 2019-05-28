<template>
    <div id="login">
        <mdb-row>
            <mdb-col md="4">
            </mdb-col>
            <mdb-col md="4">
                <mdb-card cascade narrow class="d-flex mb-5">
                    <mdb-view>
                        <!--https://mdbootstrap.com/img/Mockups/Horizontal/6-col/pro-profile-page.jpg-->
                        <img src="../../../../images/pro-profile-page.jpg" alt="Project" class="img-fluid"/>
                        <mdb-mask overlay="white-slight" waves/>
                    </mdb-view>
                    <mdb-card-body>
                        <form-login></form-login>
                        <!--<GoogleLogin :params="params" :onSuccess="onSuccess" :onFailure="onFailure">Login</GoogleLogin>-->

                    </mdb-card-body>
                    <mdb-card-footer class="links-light profile-card-footer">
                          <span class="right">
                            <a class="p-2" href="#profile">
                              Live Preview
                              <mdb-icon icon="photo" class="ml-1"/>
                            </a>
                          </span>
                    </mdb-card-footer>
                </mdb-card>
            </mdb-col>
            <mdb-col md="4"></mdb-col>
        </mdb-row>
    </div>
</template>

<script>
    import { mdbRow,mdbCol,mdbCard,mdbView,mdbMask,mdbCardBody,
        mdbCardTitle,mdbCardText,mdbCardFooter,mdbIcon } from  'mdbvue'
    import FormLogin from './FormLogin'
    import GoogleLogin from 'vue-google-login';
    import { mapGetters } from 'vuex';

    export default {
        name: "Login",
        components: {
            mdbRow,
            mdbCol,
            mdbCard,
            mdbView,
            mdbMask,
            mdbCardBody,
            mdbCardTitle,
            mdbCardText,
            mdbCardFooter,
            FormLogin,
            mdbIcon,
            GoogleLogin
        },
        data() {
            return {
                // client_id is the only required property but you can add several more params, full list down bellow on the Auth api section
                params: {
                    client_id: "927022033892-4r5ifiki3tne8h76hhtvv5nm2mcvcdd7.apps.googleusercontent.com"
                }
            }
        },
        methods: {
            onSuccess(googleUser) {
                console.log(googleUser);

                // This only gets the user information: id, name, imageUrl and email
                console.log(googleUser.getBasicProfile());
            },
            onFailure() {

            }
        }
    }
</script>

<style scoped>
    #login{
        margin-top: 3em;
    }
    .profile-card-footer {
        background-color: #F7F7F7 !important;
        padding: 1.25rem;
    }
    .card.card-cascade .view {
        box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.15), 0 3px 12px 0 rgba(0, 0, 0, 0.15);
    }
</style>