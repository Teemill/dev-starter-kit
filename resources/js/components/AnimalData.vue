<template>
    <div>
        <table>
            <tr>
                <th v-for="(value, name) in animal" :key="value.id"><b>{{ name }}</b></th>
            </tr>
            <tr>
                <td v-for="value in animal" :key="value.id">{{ value }} </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: ["animal_id"],

        data: function () {
            return {
                animal: function() {
                    return {};
                }
            };
        },

        created: function() {
            axios
                .get("/api/animals/get/" + this.animal_id)
                .then((response) => {
                    this.animal = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>