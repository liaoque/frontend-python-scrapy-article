<template>
    <article class="main" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
        <ul>
            <li class="" v-for="article in articleList">
                <div class="content">
                    <p v-html="article.body"></p>
                </div>
            </li>
        </ul>
        <nav-more></nav-more>
    </article>
</template>

<script>
    import loadMore from'../loadMore'
    import {getDuanziList}  from '../../request/request'

    export default {
        components: {
            'nav-more': loadMore
        },
        data(){
            return {
                page: 0,
                total: -1,
                busy: false,
                articleList: [],
                articleIndex: []
            }
        },
        methods: {
            triggerMore: function (article) {
                article.show = !article.show
            },
            loadMore(){
                this.busy = true;
                if (this.total == this.articleList.length) {
                    this.articleList.length ? this.$children[0].ending() : this.$children[0].nothing();
                    return;
                }
                this.$children[0].loading();
                getDuanziList({page: ++this.page}).then(function (respone) {
                    let data = respone.data;
                    this.total = data.total;
                    data.data.forEach(function (article) {
                        if(this.articleIndex.indexOf(article.id) > -1){
                            return ;
                        }
                        this.articleIndex.push(article.id);
                        this.articleList.push({
                            id: article.id,
                            body: article.body || '',
                        });
                    }.bind(this));
                    this.$children[0].loadend();
                    this.busy = false;
                }.bind(this)).catch(function (error) {
                    console.log(error)
                }.bind(this));
            }
        },
        mounted() {

        },
        created(){

        }
    }


</script>
