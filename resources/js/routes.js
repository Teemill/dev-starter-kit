import VueRouter from "vue-router";

window.Vue = require("vue");
Vue.use(VueRouter);

let routes = [
    {
        path: "/",
        component: require("./components/Navigation.vue").default
    },
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
    },
    {
        path: "/:model_name/new/",
        component: require("./components/AddModel.vue").default,
        props: true
    },
    {
        path: "/:model_name/analytics/",
        component: require("./components/CarAnalytics.vue").default,
        props: true
    },
    {
        path: "/checkout",
        component: require("./components/Checkout.vue").default
    },
    {
        path: "/receipt",
        component: require("./components/Receipt.vue").default
    }
]

export default new VueRouter({
    routes
})