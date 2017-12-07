import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import article from '../component/article/list.vue'
import duanzi from '../component/duanzi/list.vue'
import viode from '../component/video/list.vue'
import xiezhen from '../component/xiezhen/list.vue'
import nav from '../const/nav'


const routes = [
    {
        name: 'article',
        path: nav.list[0].path,
        component: article
    },
    {
        name: 'duanzi',
        path: nav.list[1].path,
        component: duanzi
    },
    {
        name: 'video',
        path: nav.list[2].path,
        component: viode
    },
    {
        name: 'xiezhen',
        path: nav.list[3].path,
        component: xiezhen
    }
]

// 3. 创建 router 实例，然后传 `routes` 配置
// 你还可以传别的配置参数, 不过先这么简单着吧。
export default new VueRouter({
    routes: routes // （缩写）相当于 routes: routes
})