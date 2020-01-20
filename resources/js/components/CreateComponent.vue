<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5 mx-auto">
        <form @submit.prevent="addPost">
          <h1 class="h3 mb-3 font-weight-normal">Create new FAQ</h1>
          <div class="form-group">
            <label >Create Question</label>
             <input type="text" class="form-control" v-model="post.title" />
          </div>

          <div class="form-group">
            <label >Create Answer</label>
            <textarea class="form-control" v-model="post.body" rows="10"></textarea>
          </div>

          <button class="btn btn-lg btn-primary btn-block">Create FAQ</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {}
    };
  },
  methods: {
    addPost() {
      this.axios.post('/api/post/create', this.post).then(response => {
        this.$router.push({ name: "posts" });
      });
    }
  }
};
</script>
