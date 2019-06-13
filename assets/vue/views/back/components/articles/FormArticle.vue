<template>
    <div>
        <div class="form-row">
            <label for="validationCustom01">Label</label>
            <input
                    type="text"
                    class="form-control"
                    id="label"
                    placeholder="Label"
                    v-model="articleForm.label"
                    required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
            <label for="price">Description</label>
            <textarea class="form-control rounded-0"
                      id="exampleFormControlTextarea2"
                      rows="3"
                      placeholder="Description"
                      v-model="articleForm.description">

            </textarea>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input
                    type="text"
                    class="form-control"
                    id="price"
                    placeholder="Price"
                    v-model="articleForm.price">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="form-row">
            <label for="description">Famille</label>
            <select class="browser-default custom-select mb-4" @change="selectFamille($event)">
                <option value="">Sélectionner une famille</option>
                <option :value="famille.id "
                        v-for="famille in allFamille"
                        v-model="articleForm.idFamille">{{ famille.label }}
                </option>
            </select>
        </div>
        <image-crop @cropImg="cropImg($event)" :photo="image"></image-crop>
        <div class="form-row">
            <div class="col-md-4 mb-3"></div>
            <div class="col-md-4 mb-3">
                <button type="button"
                        class="btn btn-outline-success btn-rounded btn-block waves-effect"
                        @click="validArticle">
                    <i class="fas fa-save pr-2" aria-hidden="true"></i>Save
                </button>
            </div>
            <div class="col-md-4 mb-3"></div>
        </div>
    </div>
</template>

<script>
    import ImageCrop from './ImageCrop'
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: "FormArticle",
        components:{
            ImageCrop
        },
        data(){
            return {
                articleForm:{
                    id: 0,
                    label: '',
                    description: '',
                    price: '',
                    idFamille: 0,
                    photo: '',
                },
                image: ''
            }
        },
        created(){
            this.getFamilleAll()
        },
        computed:{
            ...mapGetters('famille',['familleAll']),
            allFamille(){
                return this.familleAll
            },
        },
        methods:{
            ...mapActions('famille',['getAllFamille']),
            ...mapActions('article',['updateArticle']),
            cropImg(e){
                this.articleForm.photo = e
            },
            validArticle(){
                this.updateArticle({id: this.articleForm.id,label: this.articleForm.label, description: this.articleForm.description,
                    price: this.articleForm.price, idFamille: this.articleForm.idFamille, photo: this.articleForm.photo })
            },
            async getFamilleAll(){
                await this.getAllFamille()
            },
            selectFamille(e){
                this.articleForm.idFamille = e.target.value
            }
        },
        watch:{
            allFamille(){}
        }
    }
</script>

<style scoped>
    div.form-row{
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>