<template>
    <div class="input-group md-form form-sm form-1 pl-0">
        <div class="input-group-prepend">
        <span class="input-group-text cyan lighten-2" id="basic-text1">
          <mdbIcon icon="search"/>
        </span>
        </div>
        <input class="form-control my-0 py-1"
                type="text"
                placeholder="Search"
                aria-label="Search"
                v-model="search"
                @keyup.enter="searchEnter()"
                @keyup="searchUp()">
    </div>
</template>

<script>
    import { mdbIcon, mdbFormInline, mdbInput } from 'mdbvue';
    import { mapActions } from 'vuex'
    export default {
        name: "Search",
        data(){
            return {
                search: null
            }
        },
        components: {
            mdbIcon,
            mdbFormInline,
            mdbInput
        },
        methods:{
            ...mapActions('famille',['searchFamille']),
            familleSearch(){
                this.searchFamille()
            },
            searchEnter(){
                this.searchFamille({firstResult: 1,perPage: 3,search: this.search})
            },
            searchUp(){
                if(this.search == ''){
                    this.searchFamille({firstResult: 1,perPage: 3,search: null})
                }
            }
        }
    }
</script>

<style scoped>

</style>