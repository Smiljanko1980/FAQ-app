<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                User Dashboard $auth.
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        //
        name:null,
        email:null
      }
    },
    methods:{
        getUser(){
            let users = this.$auth.user()
            return console.log(users)
        }
    }
  }
</script>
