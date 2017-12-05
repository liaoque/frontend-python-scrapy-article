import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex)


export default  new Vuex.Store({
    state: {
        modalBackdrop: false,
        navShow: false,
    },
    mutations: {
        close (state) {
            state.navShow = state.modalBackdrop = false;
        },
        showNav(state){
            state.navShow = state.modalBackdrop = true;
        }
    },
    actions:{
        close ({commit}) {
            commit('close')
        },
        showNav({commit}){
            commit('showNav')
        }
    }
})