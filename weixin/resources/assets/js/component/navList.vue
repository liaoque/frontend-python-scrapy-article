<template>
    <section class="nav fade in">
        <section class="nav-body">
            <section class="info-desc">

            </section>
            <nav>
                <ul>

                    <li v-for="(nav, index) in navList">
                        <a class="border-reset" :class="{active: index == active }" @click="chargeNav(index)">{{nav.title}}</a>
                        <!--<router-link :to="nav.path" class="border-reset"    >{{nav.title}}</router-link>-->
                    </li>
                </ul>
            </nav>
        </section>
        <section class="nav-go-back">
            <span class="face-glyphicon " @click="closeNav"></span>
        </section>
    </section>
</template>

<script>
    import nav from '../const/nav.js'
    export default {
        data(){
            return {
                navList: nav.list,
                active: -1
            }
        },
        methods: {
            chargeNav: function (index) {
                this.active = index;
                this.$router.push({path: nav.list[index].path});
                return index;
            },
            closeNav: function () {
                this.$store.dispatch('close')
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            nav.list.forEach(function (nav, i) {
                if (nav.path == this.$route.path) {
                    this.chargeNav(i);
                }
            }.bind(this));
        }
    }
</script>
