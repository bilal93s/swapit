import VueRouter from "vue-router";

const routes = [
{
    path: "/",
    component: () => import("../views/Home.vue")
}, {
    path: "/signin",
    component: () => import("../components/Form/Signin.vue")
}, {
    path: "/signup",
    component: () => import("../components/Form/Signup.vue")
}, {
    path: "/games",
    component: () => import("../views/Games.vue")
}
];

export default new VueRouter({
    mode: "history",
    routes,
});