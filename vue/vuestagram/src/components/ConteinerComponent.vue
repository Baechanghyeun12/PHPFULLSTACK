<template>
    <!-- 리스트 -->
    <div v-if="$store.state.tapFlg == 0">
        <PostComponent/>
    </div>
    <!-- 이미지 필터 -->
    <div v-if="$store.state.tapFlg == 1">
        <div :class="$store.state.filt" class="upload-img" :style="{ backgroundImage : `url(${$store.state.imgUrl})`}"></div>
        <div class="filter-box" >
            <div class="filter" :class="item" v-for="item in filterList" :key="item" :style="{ backgroundImage : `url(${$store.state.imgUrl})`}" @click="$store.commit('saveFilter', item)" >{{ item }}</div>
        </div>
    </div>
    <!-- 글 작성 -->
    <div v-if="$store.state.tapFlg == 2">
        <div :class="$store.state.filt" class="upload-img" :style="{ backgroundImage : `url(${$store.state.imgUrl})`}"></div>
        <div>
            <textarea class="write-box" name="content" id="content" placeholder="글쓰세요."></textarea>
        </div>
    </div>

</template>
<script>
import PostComponent from './PostComponent.vue'
export default {
    name: 'ConteinerComponent',
    data() {
        return {
            filterList: [ "aden", "_1977", "brannan", "brooklyn", "clarendon", "earlybird", "gingham", "hudson", "inkwell", "kelvin", "lark", "lofi", "maven", "mayfair", "moon", "nashville", "perpetua", "reyes", "rise", "slumber", "stinson", "toaster", "valencia", "walden", "willow", "xpro2"]
        }
    },
    components: {
        PostComponent,
    }
}
</script>
<style>
    
</style>