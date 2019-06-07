<template>
    <div class="flexible-content">
        <!--Navbar-->
        <navbar-component></navbar-component>
        <!--/.Navbar-->
        <notifications group="foo" />
        <!-- Sidebar -->
        <sidebar-fixed-component></sidebar-fixed-component>
        <!-- /Sidebar  -->
        <main>
            <div class="mt-5 p-5">
                <router-view></router-view>
            </div>
            <footer-component></footer-component>
        </main>

    </div>
</template>

<script>
    import { waves } from 'mdbvue'
    import Dashboard from '../dashboard/Dashboard'
    import Profile from '../profile/Profile'
    import SidebarFixedComponent from './SidebarFixedComponent'
    import NavbarComponent from './NavbarComponent'
    import FooterComponent from './FooterComponent'

    export default {
        name: 'AdminTemplate',
        components: {
            Dashboard,
            Profile,
            SidebarFixedComponent,
            NavbarComponent,
            FooterComponent
        },
        data () {
            return {

            }
        },
        created(){
            console.log('AppBack created')
        },
        mixins: [waves]
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    main {
        background-color: #EDEDEE;
    }

    .flexible-content {
        transition: padding-left 0.3s;
        padding-left: 270px;
    }

    @media (max-width: 1199.98px) {
        .flexible-content {
            padding-left: 0;
        }
    }
</style>
<style>
    .navbar-light .navbar-brand {
        margin-left: 15px;
        color: #2196f3 !important;
        font-weight: bolder;
    }
</style>
