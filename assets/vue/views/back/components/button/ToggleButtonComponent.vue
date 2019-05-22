<template>
    <div>
        <mdb-btn color="primary" @click.native="toggleActiveState" :active="active">Single Toggle</mdb-btn>
    </div>
</template>

<script>
    import { mdbBtn } from 'mdbvue';
    export default {
        name: "ToggleButtonComponent",
        components: {
            mdbBtn
        },
        data() {
            return {
                active: false,
            };
        },
        methods: {
            toggleActiveState() {
                this.active = !this.active;
            }
        }
    }
</script>

<style scoped>

</style>