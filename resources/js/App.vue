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
      }/* ,
      init() {
          this.loading= true;
          let uri = "http://127.0.0.1:8000/auth/ini";
          this.axios.get('/auth/init').then(response=> {
              this.user = response.data.user;
              this.loading = false;
              this.initiated = true;
              console.log(user);
          })
      } */
  }
};
</script>
