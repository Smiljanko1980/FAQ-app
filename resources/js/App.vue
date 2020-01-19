<template>
  <div class="app" :class="mode">
    <Header :app="this" :mode="mode" @toggle="toggle"></Header>


    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>
<script>
import Header from "./components/Header";
export default {
  name: "App",
  data() {
    return {
      mode: "light",
      user:  null,
      loading: false,
      initiated: false,
      /* req: axios.create({
          baseUrl: BASE_URL
      }) */
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
