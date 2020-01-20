// app.js

require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

Vue.component("spinner", require("vue-simple-spinner"));
import App from "./App.vue";
Vue.use(VueAxios, axios);
import store from "./store";


import HomeComponent from "./components/HomeComponent.vue";
import CreateComponent from "./components/CreateComponent.vue";
//import IndexComponent from './components/IndexComponent.vue';
import EditComponent from "./components/EditComponent.vue";
import Login from "./components/auth/Login.vue";
import Register from "./components/auth/Register.vue";
import Profile from "./components/auth/Profile.vue";

const routes = [
    {
        name: "home",
        path: "/",
        component: HomeComponent,
    },
    {
        name: "create",
        path: "/create",
        component: CreateComponent,

    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditComponent
    },
    /*AUTH COMPONENTS*/
    {
        name: "Login",
        path: "/login",
        component: Login
    },
    {
        name: "Register",
        path: "/register",
        component: Register
    },
    {
        name: "Profile",
        path: "/profile",
        component: Profile,

    }
];



const router = new VueRouter({
    mode: "history",
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();
            return;
        }
        next("/home");
    } else {
        next();
    }
});


const token = localStorage.getItem("token");
if (token) {
    Vue.prototype.$http.defaults.headers.common["Authorization"] = token;
}

const app = new Vue(
    Vue.util.extend(
        {
            router,
            store
        },
        App
    )
).$mount("#app");
