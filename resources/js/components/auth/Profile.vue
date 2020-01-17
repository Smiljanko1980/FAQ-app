<template>
<div class="container">
  <div class="jumbotron mt-5">
    <div class="col-sm-8-mx-auto">
      <h1 class="text-center">PROFILE</h1>
    </div>
    <table class="table col-md-6 mx-auto">
      <body>
        <tr>
          <td>Name</td>
          <td>{{ whole_name }}</td>
        </tr>
        <tr>
          <td>Username</td>
          <td>{{ username }}</td>
        </tr>
      </body>
    </table>
  </div>
</div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    this.getUser().then(res => {
      this.whole_name = res.user.name;
      this.username = res.user.mail;

      return res;
    });
    return {
      whole_name: '',
      username: ''
    };
  },
  methods: {
    getUser() {
      return axios
        .get("api/profile", {
          headers: {
            Authorization: `Bearer ${localStorage.usertoken}`
          }
        })
        .then(res => {
          return res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
