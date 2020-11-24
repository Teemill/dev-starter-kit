import VueRouter from "vue-router";

window.Vue = require("vue");
Vue.use(VueRouter);

let routes = [
    {
        path: "/images/asc",
        component: require("./components/AscendingImages.vue").default
    },
    {
        path: "/images/desc",
        component: require("./components/DescendingImages.vue").default
    },
    {
        path: "/images/random",
        component: require("./components/RandomImages.vue").default
    },
    {
        path: "/animals/list/",
        component: require("./components/AnimalList.vue").default
    },
    {
        path: "/animals/get/:animal_id",
        component: require("./components/AnimalData.vue").default,
        props: true
    }
]

export default new VueRouter({
    routes
})