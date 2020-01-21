<template>
  <header>
    <!------Toggle------>
    <span class="toggle-title">Switch Theme:</span>
    <Toggle :mode="mode" @toggle="$emit('toggle')"></Toggle>
    <nav>
      <router-link to="/" class="nav-link">FAQ</router-link>

      <router-link to="/create" class="nav-link" v-if="isLoggedIn">Create FAQ</router-link>

      <!-- <router-link to="/login" class="nav-link" v-if="!isLoggedIn">Login</router-link>
      -->
      <modal-login class="nav-link" v-if="!isLoggedIn" />

      <modal-register class="nav-link" v-if="!isLoggedIn" />
<!--
      <router-link to="/register" class="nav-link" v-if="!isLoggedIn">Register</router-link>
 -->
      <!--  <span><a @click="logout">Logout</a></span> -->

      <a v-if="isLoggedIn" @click="logout" class="nav-link">Logout</a>
    </nav>
  </header>
</template>
<script>
import Toggle from "./Toggle";
import EventBus from "./auth/EventBus";
import ModalLogin from "./modal/ModalLogin";
import ModalRegister from "./modal/ModalRegister.vue"
export default {
  props: ["mode", "app"],
  components: {
    Toggle,
    ModalLogin,
    ModalRegister
  },
  created: function() {
    this.$http.interceptors.response.use(undefined, function(err) {
      return new Promise(function(resolve, reject) {
        if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
          this.$store.dispatch(logout);
        }
        throw err;
      });
    });
  },

  computed: {
    isLoggedIn: function() {
      return this.$store.getters.isLoggedIn;
    }
  },

  methods: {
    logout: function() {
      this.$store.dispatch("logout").then(() => {
        this.$router.push("/");
        location.reload();
      });
    }
  }
};
</script>
