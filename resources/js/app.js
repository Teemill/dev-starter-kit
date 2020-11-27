/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/*
Vue.component('ascending-images', require('./components/AscendingImages.vue').default);
Vue.component('descending-images', require('./components/DescendingImages.vue').default);
Vue.component('random-images', require('./components/RandomImages.vue').default);
 
Vue.component('animal-list', require('./components/AnimalList.vue').default);
Vue.component('animal-data', require('./components/AnimalData.vue').default);
*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from "./routes";
import Vuex from "vuex";

Vue.use(Vuex);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('shopping-cart', require('./components/CartComponent.vue').default);

const store = new Vuex.Store({
    state: {
        items: []
    },

    mutations: {
        addToCart(state, item) {
            state.items.push({
                id: item.id,
                name: item.name,
            })
        },

        // checks the cart array for the given item, if found then:
        // if the quantity (count) is > 1, then the quantity is reduced,
        // else the item is spliced out of the array
        removeFromCart(state, item) {
            for (let i = 0; i < state.items.length; i++) {
                if (state.items[i].id === item.id) {
                    if (state.items[i].count > 1) {
                        state.items[i].count--;
                        return;
                    } else {
                        state.items.splice(i, 1);
                    }
                }
            }
        },

        clearCart(state) {
            state.items = [];
        }
    }
  })

const app = new Vue({
    el: '#app',

    router,

    store: store
});
