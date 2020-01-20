<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form v-on:submit.prevent="register">
          <h1 class="h3 mb-3 font-weight-normal">Register</h1>
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input
              type="first_name"
              v-model="first_name"
              class="form-control"
              name="first_name"
              placeholder="Enter First Name"
            />
          </div>

          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input
              type="last_name"
              v-model="last_name"
              class="form-control"
              name="last_name"
              placeholder="Enter Last Name"
            />
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input
              type="username"
              v-model="username"
              class="form-control"
              name="username"
              placeholder="Enter Username"
            />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input
              type="password"
              v-model="password"
              class="form-control"
              name="password"
              placeholder="Enter Password"
            />
          </div>

          <button class="btn btn-lg btn-primary btn-block">Register</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      first_name: "",
      last_name: "",
      username: "",
      password: ""
    };
  },
  methods: {
    register() {
      axios
        .post("/api/register", {
          name: this.first_name + " " + this.last_name,
          username: this.username,
          password: this.password
        })
        .then(response => {
          //console.log(response);
          this.$router.push({ name: "Login" });
        })
        .catch(err => {
          console.log(err);
        });
    }
     }
};
</script>
