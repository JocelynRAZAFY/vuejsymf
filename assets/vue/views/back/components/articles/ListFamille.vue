<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item"
                v-for="famille in allFamille"
                :key="famille.id"
                @click="selectFamille(famille)">
                    <b-img :src="famille.photo"  slot="aside" width="84" height="84" alt="placeholder"></b-img>
                    <div>
                        <button type="button"
                                class="btn btn-danger px-3"
                                @click="removeFam(famille)">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                        </button>

                        <!--<p class="mb-0">-->
                            <!--{{ famille.label}}-->
                        <!--</p>-->
                    </div>
                <h5 class="mt-0 mb-1">{{ famille.label}}</h5>
            </li>
        </ul>
        <div class="overflow-auto">
            <b-pagination
                    v-model="currentPage"
                    :total-rows="rows"
                    :per-page="perPage"
            ></b-pagination>

            <p class="mt-3">Current Page: {{ currentPage }}</p>
        </div>

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
                perPage: 3,
                currentPage: 1
            }
        },
        computed:{
            ...mapGetters('famille',['familles','totalRows','search']),
            allFamille(){
                return this.familles
            },
            rows(){
                return this.totalRows
            }
        },
        mounted(){
            this.getListFamille(1,3)
        },
        created(){
        },
        methods:{
            ...mapActions('famille',['getAllFamille','searchFamille','removeFamille']),
            ...mapMutations('famille',['SET_FAMILLE']),
            async getListFamille(firstResult,perPage){
                await this.searchFamille({firstResult: firstResult, perPage: perPage, search: this.search})
            },
            selectFamille(famille){
                this.SET_FAMILLE(famille)
            },
            addFamille(){
                this.SET_FAMILLE({id: 0, label: '', photo: ''})
            },
            async removeFam(famille){
                await this.removeFamille({id: famille.id})
                this.currentPage = 1
                this.perPage = 3
                this.addFamille()
            }
        },
        watch:{
            async currentPage(page){
                await this.searchFamille({firstResult: page, perPage: this.perPage, search: this.search})
                this.addFamille()
            },
            allFamille(){}
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
        margin-top: 30px;
    }


</style>