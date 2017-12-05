import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import article from '../component/article/list.vue'
import nav from '../const/nav'


const routes = [
    {
        path: nav.list[0].path,
        component: article
    }
]

// 3. 创建 router 实例，然后传 `routes` 配置
// 你还可以传别的配置参数, 不过先这么简单着吧。
export default new VueRouter({
    routes // （缩写）相当于 routes: routes
})