<template>
  <div class="container">
    <h2 class="h3 mb-3 font-weight-normal">Please Register</h2>
    <div class="alert alert-danger" v-if="has_error && !success">
      <p v-if="error == 'registration_validation_error'">Validation Errors.</p>
      <p
        v-else
      >Error, can not register at the moment. If the problem persists, please contact an administrator.</p>
    </div>
    <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
        <label for="name">Name</label>
        <input
          id="name"
          type="name"
          v-model="name"
          class="form-control"
          name="name"
          placeholder="Enter Full Name"
          ref="name"
          @keydown.shift.tab.prevent
          autocomplete
        />
        <span class="alert alert-danger" v-if="has_error && errors.name">{{ errors.name }}</span>
      </div>
      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
        <label for="email">E-mail</label>
        <input
          type="email"
          id="email"
          class="form-control"
          placeholder="user@example.com"
          v-model="email"
          name="email"
          ref="email"
          autocomplete
        />
        <br />
        <span class="alert alert-danger" v-if="has_error && errors.email">{{ errors.email }}</span>
      </div>
      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
        <label for="password">Password</label>
        <input
            type="password"
            v-model="password"
            class="form-control"
            name="password"
            placeholder="Enter Password"
            autocomplete/>
      </div>
      <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
        <label for="password_confirmation">Password confirmation</label>
        <input
          type="password"
          id="password_confirmation"
          class="form-control"
          v-model="password_confirmation"
          placeholder="Enter Password"
          name="password_confirmation"
          autocomplete
        />
        <br />
        <span class="alert alert-danger" v-if="has_error && errors.password">{{ errors.password }}</span>
      </div>
      <br />
       <br />
      <button class="btn btn-lg btn-primary btn-block">Submit</button>
    </form>
    <div>
      <p class="redirect-auth">
        Already an account?
        <a href="#" @click.prevent="showLogin" @keydown.tab.exact.prevent>Login</a>
      </p>
    </div>
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
      has_error: false,
      error: "",
      errors: {},
      success: false
    };
  },
  methods: {
    register() {
      var app = this;
      this.$auth.register({
        data: {
          name: app.name,
          email: app.email,
          password: app.password,
          password_confirmation: app.password_confirmation
        },
        success: function() {
          app.success = true;
          this.$router.push({
            name: "login",
            params: { successRegistrationRedirect: true }
          });
        },
        error: function(res) {
          console.log(res.response.data.errors);
          app.has_error = true;
          app.error = res.response.data.error;
          app.errors = res.response.data.errors || {};
        }
      });
    }

  }
};
</script>
