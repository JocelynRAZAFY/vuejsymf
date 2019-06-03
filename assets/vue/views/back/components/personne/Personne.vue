<template>
    <div id="app">
        <!--<img src="../../../../../images/logo.png">-->
        <div id="table-wrapper" class="ui container">
            <my-vuetable></my-vuetable>
        </div>
    </div>
</template>

<script>
    import MyVuetable from './MyVuetable'

    export default {
        name: 'Personne',
        components: {
            MyVuetable
        }
    }
</script>

<style scoped>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
    th {
        color: #ec971f;
    }
    tr{
        background-color: #ffffff;
    }
</style>