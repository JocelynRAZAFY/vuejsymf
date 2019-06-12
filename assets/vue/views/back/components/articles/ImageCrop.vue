<template>
    <div class="form-row">
        <div class="custom-file">
            <input type="file"
                   class="custom-file-input"
                   id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01"
                   @change="setImage"
                   name="image" accept="image/*">
            <label class="custom-file-label" for="inputGroupFile01">Sélectionner le fichier</label>
        </div>
        <mdb-modal size="md" :show="modal" @close="modal = false">
            <mdb-modal-header>
                <!--<mdb-modal-title>Modal title</mdb-modal-title>-->
            </mdb-modal-header>
            <mdb-modal-body>
                <div style="width: 400px; height:300px; border: 1px solid gray; display: inline-block;">
                    <vue-cropper
                            ref='cropper'
                            :guides="true"
                            :view-mode="2"
                            drag-mode="crop"
                            :auto-crop-area="0.5"
                            :min-container-width="250"
                            :min-container-height="180"
                            :background="true"
                            :rotatable="true"
                            :src="imgSrc"
                            alt="Source Image"
                            :img-style="{ 'width': '400px', 'height': '300px' }">
                    </vue-cropper>
                </div>

            </mdb-modal-body>
            <mdb-modal-footer>
                <mdb-btn
                        color="secondary"
                        size="sm"
                        @click="cropImage"
                        v-if="imgSrc != ''"
                >
                    Crop</mdb-btn>

                <mdb-btn
                        color="primary"
                        size="sm"
                        @click="rotate"
                        v-if="imgSrc != ''">
                    Rotate
                </mdb-btn>
            </mdb-modal-footer>
        </mdb-modal>
        <img v-if="cropImg"
             :src="cropImg"
             style="width: 200px; height: 150px; border: 1px solid gray"
             alt="Cropped Image" />
    </div>
</template>

<script>
    import VueCropper from 'vue-cropperjs';
    import 'cropperjs/dist/cropper.css';
    import { mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter, mdbBtn } from 'mdbvue';
    import { mapGetters } from 'vuex'

    export default {
        name: "ImageCrop",
        components:{
            VueCropper,
            mdbModal,
            mdbModalHeader,
            mdbModalTitle,
            mdbModalBody,
            mdbModalFooter,
            mdbBtn
        },
        props: ['photo'],
        data(){
            return {
                imgSrc: '',
                cropImg: '',
                modal: false
            }
        },
        computed:{
            showImage(){
                this.cropImg = this.photo
            }
        },
        methods:{
            setImage(e) {
                const file = e.target.files[0];
                if (!file.type.includes('image/')) {
                    alert('Please select an image file');
                    return;
                }
                if (typeof FileReader === 'function') {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        this.imgSrc = event.target.result;
                        // rebuild cropperjs with the updated source
                        this.$refs.cropper.replace(event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Sorry, FileReader API not supported');
                }

                this.modal = true
            },
            cropImage() {
                // get image data for post processing, e.g. upload or setting image src
                this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
                this.$emit('cropImg',this.cropImg)
            },
            rotate() {
                // guess what this does :)
                this.$refs.cropper.rotate(90);
            },

        },
        watch:{
            showImage(){
                this.cropImg = this.photo
            }
        }
    }
</script>

<style scoped>

</style>