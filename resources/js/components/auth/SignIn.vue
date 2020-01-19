<template>
  <div>
    <form @submit.prevent="submit">
      <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" v-model="form.email" />
      </div>

      <div>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" v-model="form.password" />
      </div>
      <div>
        <button type="submit">Sign In</button>
      </div>
    </form>
  </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
  name: "signin",
  components: {},
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
      ...mapActions({
          signIn: 'auth/singIn'
      }),
      submit() {
          this.signIn(this.form)
      }
  }
};
</script>
