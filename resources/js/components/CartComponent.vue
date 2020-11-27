<template>
    <div class="row">
        <div>
            <router-link tag="img" to="/checkout" :src="iconPath" alt="shopping cart"></router-link>
        </div>
        <div>
            <h3>{{ itemsInCart }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        itemsInCart: function() {
            return this.$store.state.items.length;
        },

        iconPath: function() {
            if (this.itemsInCart > 0) {
                return "storage/icons/shopping-cart-blue.png";
            } else {
                return "storage/icons/shopping-cart-grey.png";
            }
        }
    }
}
</script>