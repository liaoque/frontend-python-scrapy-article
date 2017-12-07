<template>
    <div class="page__bd">
        <div class="weui-loadmore" v-show="loadingSatus">
            <i class="weui-loading"></i>
            <span class="weui-loadmore__tips">正在加载</span>
        </div>
        <div v-show=" !loadingSatus && nothingStatus == 1" class="weui-loadmore weui-loadmore_line">
            <span class="weui-loadmore__tips">暂无数据</span>
        </div>
        <div v-show="!loadingSatus && nothingStatus == 0" class="weui-loadmore weui-loadmore_line weui-loadmore_dot">
            <span class="weui-loadmore__tips">这就是底线</span>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                loadingSatus: 1,
                nothingStatus: -1,
            }
        },
        methods: {
            loading(){
                return this.loadingSatus = 1;
            },
            loadend(){
                return this.loadingSatus = 0;
            },
            nothing(){
                this.loadend();
                return this.nothingStatus = 1;
            },
            ending(){
                this.loadend();
                return this.nothingStatus = 0;
            }
        }
    };
</script>
