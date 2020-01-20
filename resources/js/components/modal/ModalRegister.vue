<template>
  <div>
    <a to="/register" @click.prevent="show" class="nav-link">Register</a>

    <modal name="modal-register" @opened="opened" :height="550">
      <form v-on:submit.prevent="register">
        <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>

        <div class="form-group">
          <label for="name">Name</label>
          <input
            id="name"
            type="name"
            v-model="name"
            class="form-control"
            name="name"
            placeholder="Enter Whole Name"
            ref="name"
            @keydown.shift.tab.prevent
            autocomplete
          />
        </div>
        <div class="form-group">
          <label for="email" >Email</label>
          <input
            id="email"
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
          <label for="password" id="password" >Confirm Password</label>
          <input
            type="password"
            v-model="password_confirmation"
            class="form-control"
            name="password_confirmation"
            placeholder="Enter Password"
            autocomplete
          />
        </div>

        <button class="btn btn-lg btn-primary btn-block" @keydown.tab.exact.prevent>Register</button>
      </form>
      <div>
        <p class="redirect-auth">
          Already an account?
          <a href="#" @click.prevent="showLogin" @keydown.tab.exact.prevent>Login</a>
        </p>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      is_admin: null
    };
  },

  components: {},
  methods: {
    show() {
      this.$modal.show("modal-register");
    },
    showLogin() {
      this.$modal.show("modal-login");
      this.$modal.hide("modal-register");
    },

    opened() {
      this.$refs.email.focus();
    },
    hide() {
      this.$modal.hide("modal-register");
    },
    register: function() {
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        is_admin: this.is_admin
      };
      this.$store

        .dispatch("register", data)
        .then(() => {
          this.$router.push("/");
        })
        .catch(err => console.log(err));
    }
  }
};
</script>

