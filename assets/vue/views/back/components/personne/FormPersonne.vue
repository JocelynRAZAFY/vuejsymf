<template>
    <mdb-container class="mt-5">
        <div class="row">
            <button
                    type="button"
                    class="btn btn-outline-warning waves-effect btn-sm"
            @click="addPersonne">
                <i class="fas fa-plus mr-2" aria-hidden="true"></i>Ajouter
            </button>
        </div>
        <!-- Custom styles -->
        <mdb-row>
            <mdb-col md="12">
                <mdb-card class="mb-4">
                    <mdb-card-header> Formulaire Personne </mdb-card-header>
                    <mdb-card-body>
                        <form class="needs-validation" novalidate @submit="validPersonne">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">First name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="firstName"
                                            placeholder="First name"
                                            v-model="perso.firstName"
                                            required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="lastName"
                                            placeholder="Last name"
                                            v-model="perso.lastName"
                                            required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Registration</label>
                                    <div class="input-group">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="validationCustomUsername"
                                                placeholder="Registration"
                                                v-model="perso.registrationNumber"
                                                required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="adresse">Adresse</label>
                                    <textarea
                                            class="form-control"
                                            id="adress"
                                            v-model="perso.adress"
                                            rows="2">

                    </textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tel">Tél</label>
                                    <textarea
                                            class="form-control"
                                            id="tel"
                                            v-model="perso.tel"
                                            rows="2">

                    </textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="birthday">Birthday</label>
                                    <input
                                            type="date"
                                            class="form-control"
                                            id="birthday"
                                            placeholder="Birthday"
                                            v-model="perso.birthday"
                                            required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3"></div>
                                <div class="col-md-4 mb-3">
                                    <button type="submit" class="btn btn-outline-success btn-rounded btn-block waves-effect">
                                        <i class="fas fa-save pr-2" aria-hidden="true"></i>Save
                                    </button>
                                </div>
                                <div class="col-md-4 mb-3"></div>
                            </div>

                        </form>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </mdb-container>
</template>

<script>
    import { mdbContainer, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbRow, mdbCol } from "mdbvue";
    import { mapState, mapActions, mapGetters } from 'vuex';
    export default {
        name: "FormPersonne",
        components: {
            mdbContainer,
            mdbBtn,
            mdbCard,
            mdbCardBody,
            mdbCardHeader,
            mdbRow,
            mdbCol
        },
        props:['rowData'],
        data(){
          return {
              perso: {
                  id: 0,
                  firstName: '',
                  lastName: '',
                  registrationNumber: '',
                  birthday: '',
                  adress: '',
                  tel: '',
              }
          }
        },
        computed:{
            ...mapState('personne',['personne']),
            ...mapGetters('user',['getToken']),
            setPersonne(){
                return this.personne
            }
        },
        created(){
            console.log('FormPersonne created')
        },
        watch: {
            rowData(data){
                this.perso.id = data.id
                this.perso.lastName = data.lastName
                this.perso.firstName = data.firstName
                this.perso.registrationNumber = data.registrationNumber
                this.perso.adress = data.adress
                this.perso.tel = data.tel
                this.perso.birthday = data.birthday.split('/')[2]+'-'+data.birthday.split('/')[1]+'-'+data.birthday.split('/')[0]
            }
        },
        methods:{
            ...mapActions('personne',['updatePersonne']),
            async validPersonne(e){
                e.preventDefault()
              await this.updatePersonne({param: this.perso,token: this.getToken})
                this.addPersonne()
            },
            addPersonne(){
                this.perso.id = 0
                this.perso.firstName = ''
                this.perso.lastName = ''
                this.perso.registrationNumber = ''
                this.perso.birtday = ''
                this.perso.adress = ''
                this.perso.tel = ''
            }
        }
    }
</script>

<style scoped>
    div.row{
        margin-bottom: 2em;
    }
</style>