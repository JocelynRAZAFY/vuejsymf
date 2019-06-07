<template>
    <div class="sidebar-fixed position-fixed">
        <a class="logo-wrapper"><img alt="" class="img-fluid" src="../../../../../images/logo-mdb-vue-small.png"/></a>
        <mdb-list-group class="list-group-flush">
            <router-link to="/dashboard" @click.native="activeItem = 1">
                <mdb-list-group-item :action="true" :class="activeItem === 1 && 'active'">
                    <mdb-icon icon="pie-chart" class="mr-3"/>Dashboard
                </mdb-list-group-item>
            </router-link>
            <router-link to="/profile" @click.native="activeItem = 2">
                <mdb-list-group-item :action="true" :class="activeItem === 2 && 'active'">
                    <mdb-icon icon="user" class="mr-3"/>Formulaire
                </mdb-list-group-item>
            </router-link>
            <router-link to="/articles"  @click.native="activeItem = 3">
                <mdb-list-group-item :action="true" :class="activeItem === 3 && 'active'">
                    <mdb-icon icon="table" class="mr-3"/>Articles
                </mdb-list-group-item>
            </router-link>
            <router-link to="/maps" @click.native="activeItem = 4">
                <mdb-list-group-item :action="true" :class="activeItem === 4 && 'active'">
                    <mdb-icon icon="map" class="mr-3"/>Maps
                </mdb-list-group-item>
            </router-link>
            <router-link to="/404" @click.native="activeItem = 5">
                <mdb-list-group-item :action="true" :class="activeItem === 5 && 'active'">
                    <mdb-icon icon="exclamation" class="mr-3"/>404
                </mdb-list-group-item>
            </router-link>
            <router-link to="/buttons" @click.native="activeItem = 6">
                <mdb-list-group-item :action="true" :class="activeItem === 6 && 'active'">
                    <mdb-icon icon="anchor" class="mr-3"/>Buttons
                </mdb-list-group-item>
            </router-link>
            <router-link to="/custom" @click.native="activeItem = 7">
                <mdb-list-group-item :action="true" :class="activeItem === 7 && 'active'">
                    <mdb-icon icon="list" class="mr-3"/>custom
                </mdb-list-group-item>
            </router-link>
            <router-link to="/personne" @click.native="activeItem = 8">
                <mdb-list-group-item :action="true" :class="activeItem === 8 && 'active'">
                    <mdb-icon icon="list" class="mr-3"/>personne
                </mdb-list-group-item>
            </router-link>
        </mdb-list-group>
    </div>
</template>

<script>
    import { mdbIcon, mdbListGroup, mdbListGroupItem} from 'mdbvue'
    export default {
        name: "SidebarFixedComponent",
        components: {
            mdbListGroup,
            mdbListGroupItem,
            mdbIcon,
        },
        data () {
            return {
                activeItem: 1
            }
        },
        beforeMount () {
            this.activeItem = this.$route.matched[0].props.default.page
        },
    }
</script>

<style scoped>
    .sidebar-fixed {
        left: 0;
        top: 0;
        height: 100vh;
        width: 270px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        z-index: 1050;
        background-color: #fff;
        padding: 1.5rem;
        padding-top: 0;
    }

    .sidebar-fixed .logo-wrapper img{
        width: 100%;
        padding: 2.5rem;
    }

    .sidebar-fixed .list-group-item {
        display: block !important;
        transition: background-color 0.3s;
    }

    .sidebar-fixed .list-group .active {
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        border-radius: 5px;
    }

    @media (max-width: 1199.98px) {
        .sidebar-fixed {
            display: none;
        }
    }
</style>