<template>
  <header>
    <h2>{{ mode }} Mode</h2>
    <!------Toggle------>
    <Toggle :mode="mode" @toggle="$emit('toggle')" />
    <nav>
      <router-link to="/" class="nav-link">Home</router-link>
      <router-link to="/create" class="nav-link">Create Post</router-link>
      <router-link to="/posts" class="nav-link">Posts</router-link>
    </nav>
  </header>
</template>
<script>
import Toggle from './Toggle'
export default {
  props: ["mode"],
  components:{
      Toggle
  }
};
</script>
<style>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 25px;
  height: 60px;
  background: #c3c3c3;
  /* transition: background 0.3s ease-in-out; */
}
.dark header {
    background: #15202B;
}
header h2 {
  font-size: 24px;
  text-transform: uppercase;
  font-weight: 900;
}
header nav {
    display: flex;
    height: 60px;
}
header nav .nav-link{
    display: flex;
    align-items: center;
    padding:0 15px;
    color: #fff;
}
header nav .nav-link:hover{
    background: #B0B0B0;
}
.dark header nav .nav-link:hover{
    background: #101520;
}
.light header nav .nav-link{
    color:#101520;
}
</style>
