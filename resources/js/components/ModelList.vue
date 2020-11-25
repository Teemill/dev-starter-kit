<template>
    <div>
        <table>
            <tr>
                <th><b>{{ model_name }}</b></th>
            </tr>
            <tr v-for="model in models" :key="model.id">
                <router-link tag="td" :to="'/' + model_name + '/get/' + model.id"> {{ model.name }} </router-link>
            </tr>
        </table>
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
                }
            };
        },

        created: function() {
            axios
                .get("/api/" + this.model_name + "/list")
                .then((response) => {
                    this.models = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>