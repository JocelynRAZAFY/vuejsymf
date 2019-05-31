<template>
    <div>
        <form @submit="setCustom($event)" class="text-center border border-light p-5">

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
        <!-- Default form login -->
    </div>
</template>

<script>
    import { mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter, mdbBtn } from 'mdbvue';
    import { mapActions,mapGetters } from 'vuex'
    export default {
        name: "FormCustom",
        components: {
            mdbModal,
            mdbModalHeader,
            mdbModalTitle,
            mdbModalBody,
            mdbModalFooter,
            mdbBtn
        },
        data(){
          return {
              customForm: {
                  id: 0,
                  title: null,
                  content: null
              }
          }
        },
        computed:{
            ...mapGetters('user',['getToken']),
            ...mapGetters('custom',['customs']),
        },
        mounted(){
            let liste = this.customs.listes[this.$route.params.id]
            this.customForm.id = this.$route.params.id
            this.customForm.title = liste.title
            this.customForm.content = liste.content
            // console.log(this.customs.listes[this.$route.params.id])
        },
        methods:{
            ...mapActions('custom',['updateCustom']),
            async setCustom(e){
                e.preventDefault()
                await this.updateCustom({param: this.customForm, token: this.getToken})
                console.log(this.customs)
            }
        }
    }
</script>

<style scoped>

</style>