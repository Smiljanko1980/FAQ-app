<template>
  <div class="app" :class="mode">

    <ul class="navbar-nav">
      <li class="nav-item">
        <router-link to="/" class="nav-link">Home</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/create" class="nav-link">Create Post</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/posts" class="nav-link">Posts</router-link>
      </li>
    </ul>
    <br/>
    <h1>Hello World</h1>
    <br />
    <transition name="fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
.app{
    width: 100vw;
    min-height: 100vh;
    background: #F3F3F3;
    color: #15202B;
}
.dark {
    background-color: #192734;
    color: #f3f3f3;
}
</style>

<script>
export default {
  name: "app",
  data() {
    return {
      mode: "dark"
    };
  },
  components: {}
};
</script>
