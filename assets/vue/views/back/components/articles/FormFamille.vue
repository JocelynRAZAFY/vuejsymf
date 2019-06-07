<template>
    <div>
        <form class="needs-validation" novalidate @submit="validFamille">
            <div class="form-row">
                <div class="row">
                    <label for="validationCustom01">Label</label>
                    <input
                            type="text"
                            class="form-control"
                            id="label"
                            placeholder="Label"
                            v-model="famille.label"
                            required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="row">
                    <b-form-file
                            v-model="famille.photo"
                            :state="Boolean(file)"
                            placeholder="Choose a file..."
                            drop-placeholder="Drop file here..."
                    ></b-form-file>
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
    </div>
</template>

<script>
    export default {
        name: "FormFamille",
        data(){
            return {
                famille:{
                    label: '',
                    photo: ''
                }
            }
        },
        methods:{
            validFamille(e){
                e.preventDefault()

            }
        }
    }
</script>

<style scoped>
    div.row{
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>