<template>
    <div>
        <header>
            <div class="fixed-header">
                <span class="face-glyphicon nav-icon" @click="showNav"></span>
                <h1 class="" @click="showNav">微信工作号</h1>
            </div>
            <div class="block-header"></div>
        </header>

        <nav-list v-show="navShow"></nav-list>

        <article>
            <router-view v-on:showSwiper="showSwiper"></router-view>
        </article>

        <div class="modal-backdrop fade in" v-show="modalBackdrop"></div>

        <section class="image-dialog" v-show="showMySwiper">
            <div class="image-list">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                    </div>

                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev swiper-button-white"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
                </div>

            </div>
            <div class="close" @click="showMySwiper=!showMySwiper">
                <span class="face-glyphicon "></span>
            </div>
        </section>

    </div>
</template>

<script>
    import NavList from '../component/navList.vue'
    import { mapState } from 'vuex'
    let computed = mapState([
        'modalBackdrop',
        'navShow'
    ]);
    export default {
        data(){
            return {
                mySwiper: null,
                showMySwiper: false
            }
        },
        components: {
            'nav-list': NavList
        },
        computed: computed,
        methods: {
            showNav: function (event) {
                this.$store.dispatch('showNav')
            },
            showSwiper(imageList){
                if (imageList && imageList.length) {
                    let swiper = this.mySwiper;
                    swiper.removeAllSlides();
                    imageList.forEach(function (image) {
                        swiper.appendSlide('  <div class="swiper-slide"><img src="' + image + '"></div>')
                    });
                    setTimeout(function(){
                        swiper.update();
                    })
                    this.showMySwiper = true;
                }
            }
        },
        mounted() {
            this.mySwiper = new Swiper('.swiper-container', {
                // 如果需要前进后退按钮
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            })
        },
        created(){
        }
    }
</script>
