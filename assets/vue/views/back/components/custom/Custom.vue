<template>

    <div class="row">
        <div class="col-md-6">
            <list-custom></list-custom>
        </div>
        <div class="col-md-6">
            <form-custom v-if="this.$route.params.id"></form-custom>
        </div>
    </div>

</template>

<script>

    import ListCustom from './ListCustom'
    import FormCustom from './FormCustom'

    export default {
        name: "Custom",
        components:{
            ListCustom,
            FormCustom
        }
    }
</script>

<style scoped>

</style>