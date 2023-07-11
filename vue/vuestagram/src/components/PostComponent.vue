<template>
    <div class="post" v-for="list in $store.state.boardData" :key="list">
        <div class="post-img" :style="{ backgroundImage : `url(${list.img})`}" ></div>
        <div class="post-content">
            <p>{{ list.likes }} 좋아요</p>
            <p><strong>{{ list.name }}</strong>{{ list.content }}</p>
            <p>{{ list.created_at }}</p>
        </div>
    </div>
</template>
<script>
export default {
    name: 'PostComponent',
}
</script>
<style>
    
</style>