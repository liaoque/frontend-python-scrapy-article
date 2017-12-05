<template>
    <article class="main">
        <ul>
            <li class="" v-for="article in articleList">
                <article class="item-article">
                    <p class="title">{{article.title}}</p>
                    <div class="article-content">
                        {{article.body}}
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link"  @click="triggerMore(article)">
                            <div class="weui-cell__bd">查看更多</div>
                            <span class="weui-cell__ft" :class="{'weui-cell__top': !article.show}"></span>
                        </a>
                    </div>
                </article>

            </li>
        </ul>

    </article>
</template>

<script>
    import loadMore from'../loadMore'
    let count = 0;
    export default {

        data(){
            return {
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
                setTimeout(function () {
                    for (var i = 0, j = 10; i < j; i++) {
                        this.articleList.push({
                            title: count++,
                            body: '11',
                            show: false
                        });
                    }
                    this.busy = false;
                }.bind(this), 1000);
            }
        },
        mounted() {

        },
        created(){
            this.loadMore();
        }
    }


</script>
