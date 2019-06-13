import ArticleAPI from '../api/articleApi'

export default {
    namespaced: true,
    state:{
        articles: [],
        article: {},
        totalRows: 0,
        search: null,
        status: false
    },
    getters:{
        articles(state){
            return state.articles
        },
        article(state){
            return article;
        },
        totalRows(state){
            return state.totalRows
        },
        search(state){
            return state.search
        }
    },
    mutations:{
        'SET_ARTICLES' (state,data){
            state.articles = data
            // state.totalRows = data.totalRows
        },
        'UPDATE_ARTICLE' (state,article){
            state.articles.forEach(function (item) {
                if(item.id == article.id){
                    item.label = article.label
                    item.description = article.description
                    item.price = article.price
                    item.photo = article.photo
                    item.famille = article.famille
                }
            })
        },
        'SET_ARTICLE' (state,article){
            state.article = article
        },
        'SET_SEARCH' (state,search){
            state.search = search
        }
    },
    actions:{
        async updateArticle({commit, dispatch},param){
            try {
                const res = await ArticleAPI.updateArticle(param)
                if(res.data.data.action != 'add'){
                    commit('UPDATE_ARTICLE',res.data.data.article)
                }else{
                    dispatch('searchArticle',{firstResult: 1,perPage: 3,search: null})
                }
            }catch (e) {

            }
        },
        async searchArticle({commit, state},{firstResult,perPage,search}){
            try {
                const res = await ArticleAPI.searchArticle({firstResult,perPage,search})
                commit('SET_ARTICLES',res.data.data)
                commit('SET_SEARCH',search)
            }catch (e) {

            }
        },
    }
}