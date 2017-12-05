<template>
    <div>
        <header>
            <span class="face-glyphicon nav-icon" @click="showNav"></span>
            <h1 class="" @click="showNav">微信工作号</h1>
        </header>

        <nav-list v-show="navShow"></nav-list>

        <article>
            <router-view></router-view>
        </article>

        <div class="modal-backdrop fade in" v-show="modalBackdrop"></div>
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
        components: {
            'nav-list': NavList
        },
        computed: computed,
        methods: {
            showNav: function (event) {
                this.$store.dispatch('showNav')
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
        }
    }
</script>
