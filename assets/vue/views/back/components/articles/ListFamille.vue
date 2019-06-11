<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item"
                v-for="famille in allFamille"
                :key="famille.id"
                @click="detailFamille(famille)">
                    <b-img :src="famille.photo"  slot="aside" width="84" height="84" alt="placeholder"></b-img>
                    <div>
                        <h5 class="mt-0 mb-1">{{ famille.label}}</h5>
                        <!--<p class="mb-0">-->
                            <!--{{ famille.label}}-->
                        <!--</p>-->
                    </div>
            </li>
        </ul>

    </div>
</template>

<script>
    import { mapGetters, mapActions, mapMutations } from 'vuex'
    import { mdbListGroup, mdbListGroupItem } from 'mdbvue';
    export default {
        name: "ListFamille",
        components: {
            mdbListGroup,
            mdbListGroupItem
        },
        data(){
            return {

            }
        },
        computed:{
            ...mapGetters('famille',['familles']),
            allFamille(){
                return this.familles
            }
        },
        created(){
            this.getAllFamille()
        },
        methods:{
            ...mapActions('famille',['getAllFamille']),
            ...mapMutations('famille',['SET_FAMILLE']),
            detailFamille(famille){
                this.SET_FAMILLE(famille)
            }
        }

    }
</script>

<style scoped>
    ul li {
        cursor: pointer;
    }
    ul li div{
        float: right;
        text-align: center;
    }


</style>