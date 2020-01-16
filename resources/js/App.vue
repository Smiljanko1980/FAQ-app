<template>
  <div class="app" :class="mode">
    <Header :mode="mode" @toggle="toggle"/>
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}
.app {
  width: 100vw;
  min-height: 100vh;
  background: #f3f3f3;
  color: #15202b;
}
.dark {
  background-color: #192734;
  color: #f3f3f3;
}
</style>

<script>
import Header from "./components/Header";
export default {
  name: "app",
  data() {
    return {
      mode: "light"
    };
  },
  components: {
    Header
  },
  methods: {
      toggle() {
         if(this.mode === 'dark') {
             this.mode = "light"
         } else {
             this.mode = "dark"
         }
      }
  }
};
</script>
