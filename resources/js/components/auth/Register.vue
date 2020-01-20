<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form v-on:submit.prevent="register">
          <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>
          <div class="form-group">
            <label for="name">Name:</label>
            <input
              type="name"
              class="form-control"
              name="name"
              placeholder="Enter First Name"
              v-model="name"
              required
              autofocus
            />
          </div>
           <div class="form-group">
            <label for="email">E-Mail Address:</label>
            <input
              type="email"
              v-model="email"
              required
              class="form-control"
              name="email"
              placeholder="Enter Email:"

            />
          </div>

          <div class="form-group">
            <label for="new-password">Password</label>
            <input
            type="new-password"
              v-model="password"
              required
              class="form-control"
              name="password"
              placeholder="Enter Password"
            />
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input
              type="password"
              class="form-control"
              name="password_confirmation"
              placeholder="Confirm Password"
              v-model="password_confirmation"
              required
            />
          </div>

          <button class="btn btn-lg btn-primary btn-block">Register</button>
        </form>
      </div>
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
      is_admin: null
    };
  },
  methods: {
    register: function() {
      let data = {
        name: this.name,
        email: this.email,
        password: this.password,
        is_admin: this.is_admin
      };
      this.$store
        .dispatch("register", data)
        .then(() =>{
             this.$router.push("/login")
        })
        .catch(err => console.log(err))
    }
  }
};
</script>
