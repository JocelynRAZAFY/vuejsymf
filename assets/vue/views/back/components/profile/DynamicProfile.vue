<template>
    <div>
        <mdb-row>
            <mdb-col md="12">
                <mdb-card cascade narrow class="mt-5">
                    <mdb-view class="gradient-card-header blue darken-2">
                        <h4 class="h4-responsive text-white">Formulaire dynamique </h4>
                    </mdb-view>
                    <mdb-card-body>
                        <!--<h3 class="mt-5 text-left"><strong>Basic examples</strong></h3>-->
                        <mdb-tbl>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthday</th>
                                    <th>Registration Number</th>
                                    <th>Adress</th>
                                    <th>Tel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(contactForm,index) in contactForms" :key="index">
                                    <th scope="row">{{ index + 1}}</th>
                                    <td>
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
                                    </td>
                                    <td>
                                        <label for="validationCustom01">Last name</label>
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
                                    </td>
                                    <td>
                                        <label for="validationCustom01">Birthday</label>
                                        <input
                                                type="date"
                                                class="form-control"
                                                id="username"
                                                placeholder="Birthday"
                                                v-model="contactForm.birthday"
                                                required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </td>
                                    <td>
                                        <label for="validationCustom01">Birthday</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="registrationNumber"
                                                placeholder="Registration Number"
                                                v-model="contactForm.registrationNumber"
                                                required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </td>
                                    <td>
                                        <label for="validationCustom01">Birthday</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="adress"
                                                placeholder="Adress"
                                                v-model="contactForm.adress"
                                                required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </td>
                                    <td>
                                        <label for="validationCustom01">Tel</label>
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="tel"
                                                placeholder="Tel"
                                                v-model="contactForm.tel"
                                                required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-button-container" style="margin-top: 21px;">
                                            <button class="btn btn-danger px-3" @click="deleteRow(index)" aria-hidden="true">
                                                <i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </mdb-tbl>
                        <button class="btn btn-warning px-3" @click="addForm()" aria-hidden="true">
                            <i class="fa fa-plus"></i>
                        </button>&nbsp;&nbsp;
                    </mdb-card-body>
                    <button type="submit"
                            class="btn btn-outline-success btn-rounded btn-block waves-effect"
                            @click="saveForm()">
                        <i class="fas fa-save pr-2" aria-hidden="true"></i>Save
                    </button>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </div>
</template>

<script>
    import { mdbRow, mdbCol, mdbCard, mdbCardBody, mdbView, mdbMask, mdbCardTitle,
        mdbCardText, mdbCardFooter, mdbIcon, mdbBtn, mdbPagination, mdbPageNav,
        mdbPageItem, mdbTbl } from 'mdbvue'
    export default {
        name: "DynamicProfile",
        components:{
            mdbRow, mdbCol, mdbCard, mdbCardBody, mdbView, mdbMask,
            mdbCardTitle, mdbCardText, mdbCardFooter, mdbIcon, mdbBtn,
            mdbPagination, mdbPageNav, mdbPageItem, mdbTbl
        },
        data(){
            return {
                contactForms: [
                    {
                        'firstName': '',
                        'lastName': '',
                        'birthday': '',
                        'registrationNumber': '',
                        'adress': '',
                        'tel': '',
                    }
                ]
            }
        },
        computed:{

        },
        methods:{
            addForm(){
                this.contactForms.push({
                    'firstName': '',
                    'lastName': '',
                    'birthday': '',
                    'registrationNumber': '',
                    'adress': '',
                    'tel': '',
                })
            },
            deleteRow(index){
                this.contactForms.splice(index,1)
            },
            saveForm(){
                console.log(this.contactForms)
            }
        }
    }
</script>

<style scoped>
    .card.card-cascade .view.gradient-card-header {
        padding: 1rem 1rem;
        text-align: center;
    }
    .card.card-cascade h3,
    .card.card-cascade h4 {
        margin-bottom: 0;
    }
</style>