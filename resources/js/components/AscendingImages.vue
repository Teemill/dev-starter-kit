<template>
    <div>
        <img v-for="image in images" :key="image.id" :src="image">
    </div>
</template>

<script>
    export default {
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
                .get("/api/images/asc")
                .then((response) => {
                    this.images = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
</script>