<template>
  <div class="bg_black" v-if="modalFlg">
    <div class="bg_white">
      <img :src="product[productNum].img" style="width: 200px" />
      <h4 @click="$emit('openModal')">{{ product[productNum].name }}</h4>
      <p>{{ product[productNum].content }}</p>
      <p>{{ product[productNum].price * inputCount }}원</p>
      <p>{{ product.count }}</p>
      <!-- <button @click="$emit('plus')">수량 증가</button><br />
      <button @click="$emit('minus')">수량 감소</button>
      <span>{{ product[productNum].count }}</span><br /> -->
      <input type="text" v-model="inputCount">
      <br>
      <span>{{ inputCount }}개</span>
      <br>
      <button @click="$emit('closeModal'); inputCount = '';">닫기</button>
      <!-- 부모한테 메세지 보냄 $emit('closeModal'); -->
    </div>
  </div>
</template>
<script>
export default {
  name: "Modal",
  data() {
    return {inputCount: "",};
  },
  watch:{
    inputCount(input) {
      if(input > 10) {
        alert('최대 10개만 구매할 수 있습니다.!!!!!!!!!!!!!!')
        this.inputCount = "10";
      }
    }
  },
  props: {
    modalFlg: Boolean,
    product: Array,
    productNum: Number,
  },
};
</script>
<style></style>
