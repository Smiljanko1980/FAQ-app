<template>
  <navbar>
    <h2>{{ mode }} Mode</h2>
    <!------Toggle------>
    <Toggle :mode="mode" @toggle="$emit('toggle')" />
    <nav>
      <router-link to="/" class="nav-link">Home</router-link>
      <router-link to="/create" class="nav-link">Create Post</router-link>
      <router-link to="/posts" class="nav-link">Posts</router-link>
    </nav>
  </navbar>
</template>
<script>
import Toggle from "./Toggle";
export default {
  name: "navbar",
  props: ["mode", "app"],
  data() {
    return {};
  },
  methods: {
    logout() {
      this.app.req.post("auth/logout").then(() => {
        this.app.user = null;
        this.$router.push("/login");
      });
    }
  },
  components: {
    Toggle
  }
};
</script>



