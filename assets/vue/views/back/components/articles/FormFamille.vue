<template>
    <div>
            <div class="form-row">
                <label for="validationCustom01">Label</label>
                <input
                        type="text"
                        class="form-control"
                        id="label"
                        placeholder="Label"
                        v-model="familleForm.label"
                        required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <image-crop @cropImg="cropImg($event)" :photo="image"></image-crop>
            <div class="form-row">
                <div class="col-md-4 mb-3"></div>
                <div class="col-md-4 mb-3">
                    <button type="button"
                            class="btn btn-outline-success btn-rounded btn-block waves-effect"
                        @click="validFamille">
                        <i class="fas fa-save pr-2" aria-hidden="true"></i>Save
                    </button>
                </div>
                <div class="col-md-4 mb-3"></div>
            </div>
    </div>
</template>

<script>
    import ImageCrop from './ImageCrop'
    import { mapActions, mapGetters, mapMutations } from 'vuex'
    export default {
        name: "FormFamille",
        components:{
            ImageCrop
        },
        data(){
            return {
                familleForm:{
                    id: 0,
                    label: '',
                    photo: ''
                },
                image: ''
            }
        },
        computed:{
            ...mapGetters('famille',['famille']),
            getFamille(){
                this.familleForm.id = this.famille.id
                this.familleForm.label = this.famille.label
                this.image = this.famille.photo
            }
        },
        methods:{
            ...mapActions('famille',['updateFamilles']),
            ...mapMutations('famille',['SET_FAMILLE']),
            validFamille(e){
                e.preventDefault()
                this.updateFamilles({id: this.familleForm.id, label: this.familleForm.label, photo: this.familleForm.photo})
                this.SET_FAMILLE({id: 0, label: '', photo: ''})
                this.image = ''
            },
            cropImg(e){
                this.familleForm.photo = e
            }
        },
        watch:{
            getFamille(){}
        }
    }
</script>

<style scoped>
    div.row{
        margin-top: 1em;
        margin-bottom: 1em;
    }
    div.form-row{
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>