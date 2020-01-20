<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form v-on:submit.prevent="login">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <div class="form-group">
            <label for="username" class="username">Username</label>
            <input
              type="username"
              v-model="username"
              class="form-control"
              name="username"
              placeholder="Enter Username"
            />
          </div>

          <div class="form-group">
            <label for="password" class="password">Password</label>
            <input
              type="password"
              v-model="password"
              class="form-control"
              name="password"
              placeholder="Enter Password"
            />
          </div>

          <button class="btn btn-lg btn-primary btn-block">Sign In</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
//import EventBus from "./EventBus";
export default {
  data() {
    return {
      username: '',
      password: ''
    };
  },
  methods: {
    login() {
      axios
        .post("/api/login", {
          username: this.username,
          password: this.password
        })
        .then(res => {
          localStorage.setItem("usertoken", res.data.token);
          this.username = '',
          this.password = '';
          this.$router.push({ name: "posts" });
        })
        .catch(err => {
          //console.log(err);
        });
      this.emitMethod();
    },/*
    emitMethod() {
      EventBus.$emit("logged-in", "loggedin");
    } */
  }
};
</script>
