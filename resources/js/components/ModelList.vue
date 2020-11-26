<template>
    <div>
        <table>
            <tr>
                <th><b>{{ formattedModelName }}</b></th>
            </tr>
            <tr class="selectable" v-for="model in models" :key="model.id">
                <router-link tag="td" :to="'/' + model_name + '/get/' + model.id"> {{ model.name }} </router-link>
            </tr>
            <tr>
                <td>
                    <router-link :to="'/' + model_name + '/new/'" tag="button" class="button">Add {{ formattedModelName.slice(0, formattedModelName.length - 1) }} </router-link>
                    <router-link :to="'/' + model_name + '/analytics/'" tag="button" class="button">See analytics</router-link>
                </td>
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
            }
        },

        computed: {
            formattedModelName: function() {
                return this.model_name.charAt(0).toUpperCase() + this.model_name.slice(1);
            }
        }
    }
</script>