<template>

  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li v-if="$store.state.tapFlg != 0" class="header-button header-button-left" @click="cancelFilt()">취소</li>
      <li>
        <img class="logo" alt="Vue logo" src="./assets/logo.png">
      </li>
      <li v-if="$store.state.tapFlg == 1" class="header-button header-button-right" @click="$store.commit('changeTabFlg', 2)">다음</li>
    </ul>
  </div>

  <!-- 컨텐츠 -->
  <ConteinerComponent/>
    <button v-if="$store.state.addBtnFlg && $store.state.tapFlg == 0" @click="$store.dispatch('getMoreList')">더보기</button>
  <br>
  <br>
  <br>
  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ConteinerComponent from './components/ConteinerComponent.vue';
export default {
  name: 'App',
  created() {
    this.$store.dispatch('getMainList');
  },
  methods: {
    updateImg(e) {
      let file = e.target.files;
      let imgUrl = URL.createObjectURL(file[0]);
      this.$store.commit('changeImgUrl', imgUrl);
      this.$store.commit('changeTabFlg', 1);
      e.target.value ='';
    },
    cancelFilt(){
      this.$store.commit('changeTabFlg', 0);
      this.$store.state.filt = '';
    },
  },
  components: {
    ConteinerComponent,
  },
  
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
