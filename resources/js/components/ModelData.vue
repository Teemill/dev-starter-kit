<template>
    <div>
        <table>
            <tr>
                <th v-for="(value, name) in model" :key="value.id"><b>{{ name }}</b></th>
            </tr>
            <tr>
                <td v-for="value in model" :key="value.id">{{ value }} </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: [ "model_name", "model_id" ],

        data: function () {
            return {
                model: function() {
                    return {};
                }
            };
        },

        created: function() {
            axios
                .get("/api/" + this.model_name + "/get/" + this.model_id)
                .then((response) => {
                    this.model = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>