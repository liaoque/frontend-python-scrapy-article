<template>
    <article class="main" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
        <ul>
            <li class="" v-for="article in articleList">
                <article class="item-article">
                    <p class="title">{{article.title}}</p>
                    <div class="article-content" v-html="article.body" :class="{'article-max-height': !article.show}"></div>
                    <div>
                        <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link" :class="{'': !article.show}"
                           @click="triggerMore(article)">
                            <div class="weui-cell__bd">{{article.moreTitle}}</div>
                            <span class="weui-cell__ft" :class="{'weui-cell__top': !article.show}"></span>
                        </a>
                    </div>
                </article>
            </li>
        </ul>
        <nav-more></nav-more>
    </article>
</template>

<script>
    import loadMore from'../loadMore'
    import {getArticleList}  from '../../request/request'
    let count = 0;
    export default {
        components: {
            'nav-more': loadMore
        },
        data(){
            return {
                busy: false,
                page: 0,
                articleList: [],
                total: -1,
                articleIndex: []
            }
        },
        methods: {
            triggerMore: function (article) {
                if(article.show){
                    article.moreTitle = '展开';
                }else{
                    article.moreTitle = '收起';
                }
                article.show = !article.show
            },
            loadMore(){
                this.busy = true;
                if (this.total == this.articleList.length) {
                    this.articleList.length ? this.$children[0].ending() : this.$children[0].nothing();
                    return;
                }
                this.$children[0].loading();
                getArticleList({page: ++this.page}).then(function (respone) {
                    let data = respone.data;
                    this.total = data.total;
                    data.data.forEach(function (article) {
                        if(this.articleIndex.indexOf(article.id) > -1){
                            return ;
                        }
                        this.articleIndex.push(article.id);
                        this.articleList.push({
                            title: article.title,
                            body: article.body.body || '',
                            moreTitle:  '展开',
                            show: false
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
