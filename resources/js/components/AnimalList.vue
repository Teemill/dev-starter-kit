<template>
    <div>
        <table>
            <tr>
                <th><b>Animals</b></th>
            </tr>
            <tr v-for="animal in animals" :key="animal.id">
                <td>{{ animal.name }} </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                animals: {
                    type: Array,
                    default: []
                }
            };
        },

        created: function() {
            axios
                .get("/api/animals/list")
                .then((response) => {
                    this.animals = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>