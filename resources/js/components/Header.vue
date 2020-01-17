<template>
  <header>
    <h2>{{ mode }} Mode</h2>
    <!------Toggle------>
    <Toggle :mode="mode" @toggle="$emit('toggle')" />
    <nav>
          <router-link v-if="auth==''" to="/" class="nav-link">Home</router-link>

          <router-link v-if="auth=='loggedin'" to="/create" class="nav-link">Create FAQ</router-link>

          <router-link v-if="auth==''" to="/posts" class="nav-link">FAQs</router-link>

          <router-link v-if="auth==''" to="/login" class="nav-link">Login</router-link>

          <router-link v-if="auth==''" to="/register" class="nav-link">Register</router-link>

          <router-link v-if="auth=='loggedin'" to="/profile" class="nav-link">Profile</router-link>
          <h1 v-if="auth=='loggedin'">Hey</h1>
          <a v-if="auth=='loggedin'" href="" class="nav-link">Logout</a>


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
