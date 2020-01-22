
<template>
  <div>
    <div class="home-container">
      <h1 id="centered">Check all FAQS</h1>
      <router-link id="centered" v-if="isLoggedIn" :to="{ name: 'create' }" class="btn btn-primary">Create FAQ</router-link>

      <div class="search-wrapper">
          <h4>Search title:</h4>
        <input class="form-control" type="text" v-model="search" placeholder="Search for question.." />
    <hr/>
      </div>
      <div class="accordions">
        <dl v-for="post in filteredPosts" :key="post.id">
          <dt class="question" v-on:click="post.open = !post.open">
            <strong>{{ post.title }}</strong>
          </dt>
          <dd class="answer" v-if="!post.open">
            {{ post.body }}
            <hr />
            <router-link
              v-if="isLoggedIn"
              :to="{name: 'edit', params: { id: post.id }}"
              class="btn btn-primary"
            >Edit</router-link>
            <button
              v-if="isLoggedIn"
              class="btn btn-danger"
              @click.prevent="deletePost(post.id)"
            >Delete</button>
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
      posts: {},
      search: ""
    };
  },
  created() {
    this.AddPost();
  },
  computed: {
    filteredPosts() {
      if (this.search) {
        return this.posts.filter(item => {
          return this.search
            .toLowerCase()
            .split(" ")
            .every(v => item.title.toLowerCase().includes(v));
        });
      } else {
        return this.posts;
        console.log(this.posts)
      }
    },
    isLoggedIn: function() {
      return this.$store.getters.isLoggedIn;
    }
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
