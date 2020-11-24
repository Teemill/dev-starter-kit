<template>
    <div>
        <img v-for="image in images" :key="image.id" :src="image">
    </div>
</template>

<script>
    export default {
        props: {
            ordering: {
                type: String,
                default: "asc"
            }
        },

        data: function () {
            return {
                images: {
                    type: Array,
                    default: []
                }
            };
        },

        created: function() {
            axios
                .get("/api/images/" + this.ordering)
                .then((response) => {
                    this.images = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>