import VueRouter from "vue-router";

const routes = [
{
    path: "/",
    component: () => import("../views/Home.vue")
}, {
    path: "/signin",
    component: () => import("../views/Login.vue")
}, {
    path: "/signup",
    component: () => import("../views/Register.vue")
}, {
    path: "/games",
    component: () => import("../views/Games.vue")
}, { 
    path: "/owngameslist",
    component: () => import("../views/OwnList.vue")
    }, { 
    path: "/wishgameslist",
    component: () => import("../views/WishList.vue")
    },
];

export default new VueRouter({
    mode: "history",
    routes,
});