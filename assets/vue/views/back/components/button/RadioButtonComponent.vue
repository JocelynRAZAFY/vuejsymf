<template>
    <div>
        <mdb-btn-group>
            <mdb-btn color="primary" @click.native="toggleActiveState5" :active="active5">Radio 1 (preselected)</mdb-btn>
            <mdb-btn color="primary" @click.native="toggleActiveState6" :active="active6">Radio 2</mdb-btn>
            <mdb-btn color="primary" @click.native="toggleActiveState7" :active="active7">Radio 3</mdb-btn>
        </mdb-btn-group>
    </div>
</template>

<script>
    import { mdbBtn, mdbBtnGroup } from 'mdbvue';
    export default {
        name: "RadioButtonComponent",
        data() {
            return {
                active5: true,
                active6: false,
                active7: false
            };
        },
        name: 'ButtonPage',
        components: {
            mdbBtn,
            mdbBtnGroup
        },
        methods: {
            toggleActiveState5() {
                this.active5 = true;
                this.active6 = false;
                this.active7 = false;
            },
            toggleActiveState6() {
                this.active5 = false;
                this.active6 = true;
                this.active7 = false;
            },
            toggleActiveState7() {
                this.active5 = false;
                this.active6 = false;
                this.active7 = true;
            }
        }
    }
</script>

<style scoped>

</style>