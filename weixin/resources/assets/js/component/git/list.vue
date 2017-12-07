<template>
    <article class="main" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
        <ul>
            <li class="" v-for="article in articleList">
                <article class="item-article">
                    <p class="title">{{article.title}}</p>
                    <div class="article-content">
                        {{article.src}}
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
                            src: '11'
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
