<template>
    <div>
        <mdb-col md="12">
            <mdb-card class="mb-4">
                <mdb-card-header>Liste Personne sur Vuetable-2</mdb-card-header>
                <mdb-card-body>
                    <div id="table-wrapper" class="ui container">
                        <form @submit="editCustom($event)" class="text-center border border-light p-5">
                            <p class="h4 mb-4">Contact us</p>
                            <!-- Name -->
                            <input type="text"
                                   id="title"
                                   class="form-control mb-4"
                                   placeholder="Titre"
                                   v-model="customForm.title">
                            <!-- Subject -->
                            <!--<label>Subject</label>-->
                            <!--<select class="browser-default custom-select mb-4">-->
                            <!--<option value="" disabled>Choose option</option>-->
                            <!--<option value="1" selected>Feedback</option>-->
                            <!--<option value="2">Report a bug</option>-->
                            <!--<option value="3">Feature request</option>-->
                            <!--<option value="4">Feature request</option>-->
                            <!--</select>-->
                            <!-- Message -->
                            <div class="form-group">
                <textarea
                        class="form-control rounded-0"
                        id="content" rows="6"
                        placeholder="content"
                        v-model="customForm.content">

                </textarea>
                            </div>
                            <!-- Send button -->
                            <button class="btn btn-info btn-block" type="submit">Send</button>

                        </form>
                    </div>
                </mdb-card-body>
            </mdb-card>
        </mdb-col>

        <!-- Default form login -->
    </div>
</template>

<script>
    import { mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter,
             mdbBtn, mdbCard, mdbCardBody, mdbCardHeader, mdbRow, mdbCol } from 'mdbvue';
    import { mapActions,mapGetters } from 'vuex'
    export default {
        name: "FormCustom",
        components: {
            mdbModal,
            mdbModalHeader,
            mdbModalTitle,
            mdbModalBody,
            mdbModalFooter,
            mdbBtn,
            mdbCard,
            mdbCardBody,
            mdbCardHeader,
            mdbRow,
            mdbCol
        },
        data(){
          return {
              customForm: {
                  id: 0,
                  title: '',
                  content: ''
              }
          }
        },
        computed:{
            ...mapGetters('user',['getToken']),
            ...mapGetters('custom',['customs','custom']),
            getCustom(){
                return this.custom
            }
        },
        mounted(){

        },
        methods:{
            ...mapActions('custom',['updateCustom','getAllPagination','setCustom']),
            async editCustom(e){
                e.preventDefault()
                await this.updateCustom({param: this.customForm})

                // if(this.customForm.id == 0){
                //     await this.getAllPagination({firstResult: 1, perPage: 3})
                // }else {
                //     this.customs.forEach(function (custom) {
                //         if(custom.id == this.customForm.id){
                //             this.setCustom(custom)
                //         }
                //     })
                // }

                // this.customForm.id = 0
                // this.customForm.title = ''
                // this.customForm.content = ''
            }
        },
        watch:{
            getCustom(data){
                this.customForm.id = data.id
                this.customForm.title = data.title
                this.customForm.content = data.content
            }
        }
    }
</script>

<style scoped>

</style>