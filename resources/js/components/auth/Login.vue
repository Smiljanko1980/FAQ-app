<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form v-on:submit.prevent="login">
          <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <div class="form-group">
            <label for="email" class="email">Email</label>
            <input
              type="email"
              v-model="email"
              class="form-control"
              name="email"
              placeholder="Enter Email"
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
export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
     login: function () {
        const email = this.email
        const password = this.password
        this.$store.dispatch('login', { email, password }).then(() => {
            this.$router.push('/');
            location.reload();
        })
        browser.reload();
      }

  }
};
</script>
