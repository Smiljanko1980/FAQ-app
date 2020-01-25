import VueRouter from "vue-router";

//Pages
import Home from "./js/pages/Home.vue";
import About from "./js/pages/About.vue";
import Register from "./js/pages/Register.vue";
import Login from "./js/pages/Login.vue";
import Dashboard from "./js/components/user/Dashboard.vue";
import AdminDashboard from "./js/components/admin/Dashboard.vue";

// Routes
const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/about",
        name: "about",
        component: About,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/register",
        name: "register",
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
            auth: true
        }
    }
];
const router = new VueRouter({
    history: true,
    mode: "history",
    routes
});
export default router;
