<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <h1>App.vue</h1>
  <PostComponent :propsTest="1"></PostComponent>
  <p>{{ test }}</p>
  <br>
  <p>{{ data.name + data.age }}</p>
  <p>{{ data2.name + data2.age }}</p>
<br>
  <button @click="data.name='김김김'">김김김</button>
  <button @click="data2.name='aaaaaaa'">김김김</button>
<br>
  <!-- <button @click="test='aaa'">김김김</button> -->
  <RouterLink to="/">홈으로</RouterLink>
  <br>
  <router-link to="/post">포스트로</router-link>
  
<router-view>
</router-view>

  <!-- <ContainerComponent></ContainerComponent>
  <PostComponent></PostComponent> -->
</template>

<script>
import {ref, reactive} from 'vue';
import PostComponent from './components/PostComponent.vue';
export default {
  name: 'App',
  setup() {
    let data = ref({name: '홍길동', age: 20});
    let data2 = reactive({name: '철수', age: 345});
    let test = "bbb";
    return {test, data, data2};
  },
  components: {
    PostComponent,
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
