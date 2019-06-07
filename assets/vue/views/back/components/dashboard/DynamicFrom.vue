<template>
    <section>
        <button class="btn btn-warning px-3" @click="addForm()" aria-hidden="true">
            <i class="fa fa-plus"></i>
        </button>&nbsp;&nbsp;
        <mdb-row class="mt-3">
            <mdb-col md="12" lg="12" class="mb-12">
                <mdb-card class="mb-12"
                          v-for="(contactForm,index) in contactForms" :key="index">
                    <mdb-card-header>
                        <button type="button" class="close" aria-label="Close" @click="removeForm(index)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h1> index {{ index }}</h1>
                    </mdb-card-header>
                    <mdb-card-body>
                        <div class="container">
                            <div class="row">
                                <label for="validationCustom01">First name</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="lastName"
                                        placeholder="Last name"
                                        v-model="contactForm.lastName"
                                        required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="row">
                                <label for="validationCustom01">First name</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="firstName"
                                        placeholder="First name"
                                        v-model="contactForm.firstName"
                                        required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
        <button type="submit"
                class="btn btn-outline-success btn-rounded btn-block waves-effect"
                @click="saveForm()">
            <i class="fas fa-save pr-2" aria-hidden="true"></i>Save
        </button>
    </section>
</template>

<script>
    import { mdbRow, mdbCol, mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbCardText, mdbIcon } from 'mdbvue'
    export default {
        name: "DynamicFrom",
        components:{
            mdbRow, mdbCol, mdbCardHeader, mdbCardBody,mdbCard
        },
        data(){
            return {
                contactForms: [
                    {
                        'lastName': '',
                        'firstName': '',
                    }
                ]
            }
        },
        methods:{
            addForm(){
                this.contactForms.push(
                    {
                        'lastName': '',
                        'firstName': '',
                    }
                )
            },
            removeForm(index){
                this.contactForms.splice(index,1)
            },
            saveForm(){
                console.log(this.contactForms)
            }

        }
    }
</script>

<style scoped>
    button.btn{
        margin-top: 1em;
    }
</style>