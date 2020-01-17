import Vue from 'vue';
import CreateComponent from '@/CreateComponent.vue';
import IndexComponent from '@/IndexComponent.vue';
import EditComponent from '@/EditComponent.vue';
import Login from '@/components/auth/Login.vue';
import Register from '@/components/auth/Register.vue';
import Profile from '@/components/auth/Profile.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'posts',
      path: '/posts',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  },
  /*AUTH COMPONENTS*/
  {
    name: 'Login',
    path: '/login',
    component: Login
},
{
    name: 'Register',
    path: '/register',
    component: Register
},
{
    name: 'Profile',
    path: '/profile',
    component: Profile
}
];
