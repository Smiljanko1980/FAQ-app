<template>
  <div class="app" :class="mode">
    <Header :mode="mode" @toggle="toggle"/>
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>
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
