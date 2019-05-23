<template>
    <div>
        <!-- Side Modal Top Right -->
        <mdb-btn color="primary" @click.native="modal = true">Left</mdb-btn>
        <mdb-modal fullHeight side position="top-left" direction="left" :show="modal" @close="modal = false">
            <form @submit="sendInformationToComponent($event)" class="text-center border border-light p-5">
                <mdb-modal-header>
                    <mdb-modal-title>Modal title</mdb-modal-title>
                </mdb-modal-header>
                <mdb-modal-body>
                    <!-- Default form login -->

                        <p class="h4 mb-4">Sign in</p>
                        <!-- Email -->
                        <input type="email"
                               id="defaultLoginFormEmail"
                               class="form-control mb-4"
                               placeholder="E-mail" v-model="email">
                        <!-- Sign in button -->

                    <!-- Default form login -->
                </mdb-modal-body>
                <mdb-modal-footer>
                    <mdb-btn color="secondary" @click.native="modal = false">Close</mdb-btn>
                    <!--<button class="btn btn-info btn-block my-4" type="submit">Sign in</button>-->
                    <mdb-btn type="submit" color="primary">Save changes</mdb-btn>
                </mdb-modal-footer>
            </form>
        </mdb-modal>
    </div>
</template>

<script>
    import { mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter, mdbBtn } from 'mdbvue';
    import { mapState, mapActions } from 'vuex'

    export default {
        name: "ModalLeftComponent",
        components: {
            mdbModal,
            mdbModalHeader,
            mdbModalTitle,
            mdbModalBody,
            mdbModalFooter,
            mdbBtn
        },
        data() {
            return {
                modal: false,
                email: null
            };
        },
        methods:{
            ...mapActions('mdb',[
                'setInformation'
            ]),
            sendInformationToComponent(e){
                e.preventDefault();
                this.setInformation(this.email)
            }
        }
    }
</script>

<style scoped>

</style>