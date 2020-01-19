
// Pages
import Vue from 'vue'
import Router from 'vue-router'
import store from './store.js'


import Home from "./components/Home.vue";
import Create from "./components/Create.vue";
import Edit from "./components/Edit.vue";
import IndexComponent from './components/IndexComponent.vue';
import Register from "./components/auth/Register.vue";
import Login from "./components/auth/Login.vue";
import Dashboard from "./components/auth/Dashboard.vue";
import AdminDashboard from "./components/auth/AdminDashboard.vue";
import App from './App.vue'
// Routes
Vue.use(Router)
let router = new Router({
    mode: 'history',
    routes: [

        {
            name: "home",
            path: "/",
            component: Home
        },
         /*FAQ Components*/
        {
            name: "create",
            path: "/create",
            component: Create,

        },
        {
            name: 'posts',
            path: '/posts',
            component: IndexComponent

        },
        {
            name: "edit",
            path: "/edit/:id",
            component: Edit,

        },
        {
            path: "/register",
            name: "register",
            component: Register,

        },
        {
            path: "/login",
            name: "login",
            component: Login,

        },
        // USER ROUTES
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard
        },
        // ADMIN ROUTES
        {
            path: "/admin",
            name: "admin.dashboard",
            component: AdminDashboard
        }
    ]
  })
router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
        next()
        return
      }
      next('/login')
    } else {
      next()
    }
  })

  export default router
