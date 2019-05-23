<template>
    <div>

            <div class="container" style="margin-bottom: 3em">
                <h2>Checkbox and radio buttons</h2>
                <div class="row">
                    <div class="col">
                        <checkbox-button-component></checkbox-button-component>
                    </div>
                    <div class="col">
                        <radio-button-component></radio-button-component>
                    </div>
                    <div class="col">
                        <toggle-button-component></toggle-button-component>
                    </div>
                </div>
            </div>

            <div class="container">
                <h2>Modal</h2>
                <div class="row">
                    <div class="col">
                        <modal-left-component></modal-left-component>
                    </div>
                    <div class="col">
                        <h1> {{ information }}</h1>
                        <h1> {{ user.email }}</h1>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>

        </div>

</template>

<script>
    import CheckboxButtonComponent from './CheckboxButtonComponent';
    import RadioButtonComponent from './RadioButtonComponent';
    import ToggleButtonComponent from './ToggleButtonComponent';
    import ModalLeftComponent from './ModalLeftComponent';
    import { mapState, mapActions, mapGetters } from 'vuex';

    export default {
        name: "Buttons",
        components: {
            CheckboxButtonComponent,
            RadioButtonComponent,
            ToggleButtonComponent,
            ModalLeftComponent
        },
        data(){
          return {

          }
        },
        computed: {
            ...mapState('mdb',[
                'information'
            ]),
            ...mapState('user',[
                'user','token'
            ])
        },
        created() {
            console.log(this.token)
            console.log(this.user)
        }
    }
</script>

<style scoped>

</style>