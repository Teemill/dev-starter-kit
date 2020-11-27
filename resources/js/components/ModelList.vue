<template>
    <div class="center">
        <div>
            <input type="text" id="" name="search" class="search-bar" value="Search" v-model="search_query">
            <button @click="performSearch" class="button">Search</button>
        </div>
        <table>
            <tr>
                <th><b>{{ formattedModelName }}</b></th>
            </tr>
            <tr class="selectable" v-for="model in models" :key="model.id">
                <router-link tag="td" :to="'/' + model_name + '/get/' + model.id"> {{ model.name }} </router-link>
            </tr>
        </table>
        <router-link :to="'/' + model_name + '/new/'" tag="button" class="button">Add {{ model_name.slice(0, formattedModelName.length - 1) }} </router-link>
        <router-link :to="'/' + model_name + '/analytics/'" tag="button" class="button">See analytics</router-link>
    </div>
</template>

<script>
    export default {
        props: [ "model_name" ],

        data: function () {
            return {
                models: {
                    type: Array,
                    default: []
                },

                search_query: ""
            };
        },

        created: function() {
            this.loadModel();
        },

        methods: {
            loadModel: function() {
                axios
                    .get("/api/" + this.model_name + "/list")
                    .then((response) => {
                        this.models = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            },

            performSearch: function() {
                axios
                    .get("/api/" + this.model_name + "/list" + "?search=" + this.formattedSearchQuery)
                    .then((response) => {
                        console.log(response);
                        this.models = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        },

        computed: {
            formattedModelName: function() {
                return this.model_name.charAt(0).toUpperCase() + this.model_name.slice(1);
            },

            formattedSearchQuery: function() {
                let formatted_search_query = this.search_query.split(/[ ,]+/).filter(Boolean).join("+")
                return formatted_search_query;
            }
        }
    }
</script>