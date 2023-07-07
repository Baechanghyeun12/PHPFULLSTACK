<template>
    <!-- 네비게이션 바 -->
        <nav class="nav">
            <!-- <a href="">HOME</a>
            <a href="">상품</a>
            <a href="">기타</a> -->
            <a v-for="item in navList" :key="item">{{ item }}</a>
            {{ product1 }}
        </nav>
</template>
<script>
export default {
    name: 'Nav',
    props: {
        product1: String,
        navList: Array,
    },
}
</script>

<style>
</style>