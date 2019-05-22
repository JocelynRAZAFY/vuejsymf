<template>
    <div>
        <mdb-btn-group>
            <mdb-btn color="primary" @click.native="toggleActiveState2" :active="active2">Checkbox 1 (pre-checked)</mdb-btn>
            <mdb-btn color="primary" @click.native="toggleActiveState3" :active="active3">Checkbox 2</mdb-btn>
            <mdb-btn color="primary" @click.native="toggleActiveState4" :active="active4">Checkbox 3</mdb-btn>
        </mdb-btn-group>
    </div>
</template>

<script>
    import { mdbBtn, mdbBtnGroup } from 'mdbvue';
    export default {
        data() {
            return {
                active2: true,
                active3: false,
                active4: false
            };
        },
        name: 'ButtonPage',
        components: {
            mdbBtn,
            mdbBtnGroup
        },
        methods: {
            toggleActiveState2() {
                this.active2 = !this.active2;
            },
            toggleActiveState3() {
                this.active3 = !this.active3;
            },
            toggleActiveState4() {
                this.active4 = !this.active4;
            }
        }
    }
</script>

<style scoped>

</style>