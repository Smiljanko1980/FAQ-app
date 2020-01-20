<template>
  <div>
    <a to="/login" @click.prevent="show" class="nav-link">Login</a>

    <modal name="modal-login" @opened="opened" :adoptive="true" :height="440" :width="400">

        <h2 class="mb-4 uppercase text-xl">Please sign in</h2>
        <form v-on:submit.prevent="login">
          <div class="form-group mb-4">
            <label for="email" id="email" class="block font-normal uppercase text-xs mb-1">Email</label>
            <input
              type="email"
              v-model="email"
              class="form-control"
              name="email"
              placeholder="Enter Email"
              ref="email"
              @keydown.shift.tab.prevent
              autocomplete
            />
          </div>

          <div class="form-group">
            <label for="password" id="password" class="block">Password</label>
            <input
              type="password"
              v-model="password"
              class="form-control"
              name="password"
              placeholder="Enter Password"
              autocomplete
            />
          </div>

          <div class="form-group">
            <label>
              <input type="checkbox" name="remember" />Keep me signed in
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block">Sign In</button>
        </form>
        <div>
          <p class="redirect-auth">
            Don't have an account?
            <a
              href="#"
              @click.prevent="showRegister"
              @keydown.tab.exact.prevent
            >Register</a>
          </p>
        </div>
    </modal>
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
  components: {},
  methods: {
    show() {
      this.$modal.show("modal-login");
    },
    showRegister() {
      this.$modal.show("modal-register");
      this.$modal.hide("modal-login");
    },
    opened() {
      this.$refs.email.focus();
    },
    hide() {
      this.$modal.hide("modal-login");
    },
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
