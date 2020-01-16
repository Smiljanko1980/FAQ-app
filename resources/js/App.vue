<template>
  <div class="app" :class="mode">
    <Navbar :app="app" :mode="mode" @toggle="toggle" />
    <spinner v-if="loading"></spinner>
    <div v-else-if="initiated">
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>
<script>
import Navbar from "./components/NavBar";
export default {
  name: "app",
  components: {
    Navbar
  },
  data() {
    return {
      mode: "light",
      user: null,
      loading: false,
      initiated: false,
      req: axios.create({
        baseUrl: BASE_URL
      })
    };
  },

  methods: {
    toggle() {
      if (this.mode === "dark") {
        this.mode = "light";
      } else {
        this.mode = "dark";
      }
    },
    init() {
      this.loading = true;
      this.axios.get("/auth/init").then(response => {
        this.user = response.data;
        this.loading = false;
        this.initiated = true;
      });
    }
  }
};
</script>
