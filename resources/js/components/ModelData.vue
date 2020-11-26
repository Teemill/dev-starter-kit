<template>
    <div>
        <table>
            <tr>
                <th v-for="(data, heading) in model" :key="heading.id">
                    <b> {{ formatHeading(heading) }} </b>
                </th>
            </tr>
            <tr>
                <td v-for="(data) in model" :key="formatData(data.id)">
                    {{ formatData(data) }}
                </td>
            </tr>
        </table>
        <div class="center">
            <button class="button" @click="addToCart">Add to cart</button>
        </div>
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
            this.loadData();
        },

        methods: {
            loadData: function() {
                axios
                    .get("/api/" + this.model_name + "/get/" + this.model_id)
                    .then((response) => {
                        this.model = response.data.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            },

            formatHeading: function(heading) {
                let finalStringArray = [];
                let splitHeading = heading.split("_");
                
                for (let word of splitHeading) {
                    finalStringArray.push(word.charAt(0).toUpperCase() + word.slice(1));
                }

                return finalStringArray.join(" ");
            },

            formatData: function(data) {
                let finalData = "";

                if (typeof data == "object") {
                    finalData = data["name"];
                } else {
                    finalData = data;
                }

                return finalData;
            },

            addToCart: function() {
                this.$store.commit("addToCart", this.model);
            }
        }
    }
</script>