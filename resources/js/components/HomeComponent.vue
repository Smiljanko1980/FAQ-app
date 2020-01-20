
<template>
  <div>
    <div class="home-container">
      <h1 >Check all FAQS</h1>
      <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Post</router-link>
      <div class="accordions">
        <dl v-for="post in posts" :key="post.id">
          <dt class="question" v-on:click="post.open = !post.open">
            <strong>{{ post.title }}</strong>
          </dt>
          <dd class="answer" v-if="!post.open">
            {{ post.body }}
            <hr />
            <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link>
            <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button>
          </dd>
        </dl>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: {}
    };
  },
  created() {
    this.AddPost();
  },
  methods: {
    AddPost() {
      axios
        .get("/api/posts")
        .then(response => (this.posts = response.data.posts));
    },
    deletePost(id) {
      this.axios.delete(`/api/post/delete/${id}`).then(response => {
        this.posts.splice(this.posts.indexOf(id), 1);
        this.AddPost();
      });
    }
  }
};
</script>
