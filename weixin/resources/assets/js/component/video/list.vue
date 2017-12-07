<template>
    <article class="main" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
        <ul>
            <li class="" v-for="article in articleList">
                <article class="item-article">
                    <!--<d-player v-bind:video="{url:article.src, pic:article.thumbnail}" ></d-player>-->
                    <p class="title">{{article.title}}</p>
                    <div class="video-dialog">
                        <div class="video-thumbnail" @click="targetVideo(article, this.event)" v-show="article.show">
                            <img :src="article.thumbnail">
                            <span class="video-play"></span>
                        </div>
                        <video controls="controls" x-webkit-airplay="true" preload="auto" webkit-playsinline="true"
                               playsinline="true" v-show="!article.show" @click="play(this.event)">
                            <source :src="article.src">
                        </video>
                    </div>
                </article>
            </li>
        </ul>
        <nav-more></nav-more>
    </article>
</template>

<script>
    import loadMore from'../loadMore'
//    import VueDPlayer from 'vue-dplayer'
    import {getViodeList}  from '../../request/request'
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
            play(event){
                let obj = event.target;
                obj.paused ? obj.play() : obj.pause();
            },
            targetVideo(article, event){
                this.play({target: event.target.parentNode.parentNode.querySelector('video')})
                article.show = !article.show;
            },
            loadMore(){
                this.busy = true;
                if (this.total == this.articleList.length) {
                    this.articleList.length ? this.$children[0].ending() : this.$children[0].nothing();
                    return;
                }
                this.$children[0].loading();
                getViodeList({page: ++this.page}).then(function (respone) {
                    let data = respone.data;
                    this.total = data.total;
                    data.data.forEach(function (article) {
                        if (this.articleIndex.indexOf(article.id) > -1) {
                            return;
                        }
                        this.articleIndex.push(article.id);
                        this.articleList.push({
                            id: article.id,
                            title: article.title,
                            show: true,
                            thumbnail: article.thumbnail,
                            src: article.src
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
