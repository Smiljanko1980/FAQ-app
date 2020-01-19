<template>
  <header>
    <!------Toggle------>
    <Toggle :mode="mode" @toggle="$emit('toggle')" />
    <nav>
      <router-link to="/" class="nav-link">FAQ</router-link>

      <router-link to="/create" class="nav-link">Create FAQ</router-link>

      <router-link to="/login" class="nav-link">Login</router-link>

      <router-link to="/register" class="nav-link">Register</router-link>
      <!--
      <a v-else @click="logout" href="javascript:;" class="nav-link">Logout</a>
      -->
    </nav>
  </header>
</template>
<script>
import Toggle from "./Toggle";
import EventBus from "./auth/EventBus";
export default {
  props: ["mode", "app"],
  components: {
    Toggle
  },
  data() {
    return {
      auth: "",
      user: ""
    };
  },
  methods: {
    logout() {
      /*
      this.axios.post("auth/logout", { baseURL: BASE_URL }).then(() => {
        this.app.user = null;
        this.$router.push("/login");
      }); */

      localStorage.removeItem("usertoken");
    }
  },
  mounted() {
    EventBus.$on("logged-in", status => {
      this.auth = status;
    });
  }
};
</script>
