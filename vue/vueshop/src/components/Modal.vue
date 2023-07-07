<template>
  <div class="bg_black" v-if="modalFlg">
    <div class="bg_white">
      <img :src="products[productNum].img" style="width: 200px" />
      <h4 @click="$emit('openModal')">{{ products[productNum].name }}</h4>
      <p>{{ products[productNum].content }}</p>
      <p>{{ products[productNum].price * products[productNum].count }}</p>
      <p>{{ product.count }}</p>
      <button>수량 증가</button><br />
      <button>수량 감소</button>
      <span>0</span><br />
      <button @click="$emit('closeModal')">닫기</button>
      <!-- 부모한테 메세지 보냄 $emit('closeModal'); -->
    </div>
  </div>
</template>
<script>
export default {
  name: "Modal",
  props: {
    modalFlg: Boolean,
    products: Array,
    productNum: Number,
  },
};
</script>
<style></style>
