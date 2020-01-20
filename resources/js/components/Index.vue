
<template>
  <div>
    <h1>FAQS</h1>
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
    <!--
     <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Post</router-link>
      </div>
    </div>
    <br />

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td>{{ post.id }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.body }}</td>
          <td>
            <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit</router-link>
          </td>
          <td>
             <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button>

          </td>
        </tr>
      </tbody>
    </table>-->
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
    //let uri = '127.0.0.1/api/posts';
    this.AddPost();


  },
  methods: {
    AddPost(){
          axios
      .get("/api/posts")
      .then(response => (this.posts = response.data.posts));
    },
    deletePost(id) {
      let uri = `http://127.0.0.1:8000/api/post/delete/${id}`;
      this.axios.delete(uri).then(response => {
        this.posts.splice(this.posts.indexOf(id), 1);
        this.AddPost();
      });
    },
  }
};
</script>
