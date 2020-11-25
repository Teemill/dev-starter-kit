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
        path: "/:model_name/list/",
        component: require("./components/ModelList.vue").default,
        props: true
    },
    {
        path: "/:model_name/get/:model_id",
        component: require("./components/ModelData.vue").default,
        props: true
    }
]

export default new VueRouter({
    routes
})