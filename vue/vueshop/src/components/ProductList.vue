<template>
  <div>프로</div>
  <!-- <div v-for="(item, i) in products" :key="i"> -->
  <!-- <div :style="styleB">싸!다!</div>
        <img  @click="openModal(i)" :src="item.img" alt="" style="width:200px;">
        <h4 @click="openModal(i)">{{ item.name }}</h4>
        <p>{{ item.content }}</p>
        <p>{{ item.price }}원</p>
        <p>{{ item.count }}개</p>
    </div> -->

  <div :style="styleB">싸!다!</div>
  <img :src="product.img" style="width: 200px" />
  <h4 @click="$emit('openModal')">{{ product.name }}</h4>
  <p>{{ product.content }}</p>
  <p>{{ product.price }}</p>
  <p>{{ product.count }}</p>
  <!-- </div> -->
</template>
<script>
export default {
  name: "ProductList",
  props: {
    product: Object,
  },
};
</script>

<style></style>
