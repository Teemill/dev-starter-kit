import VueRouter from "vue-router";

window.Vue = require("vue");
Vue.use(VueRouter);

let routes = [
    {
        path: "/images/:ordering",
        component: require("./components/ImagesDisplay.vue").default,
        props: true
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