<template>
    <div>
        <table>
            <tr>
                <th><b>Shopping Cart</b></th>
            </tr>
            <tr v-for="item in cart" :key="item.id">
                <td>{{item.name}}</td>
            </tr>
            <tr v-if="cart.length == 0">
                <td><i>Your cart is currently empty.</i></td>
            </tr>
        </table>
        <div class="center">
            <button class="button" @click="placeOrder">Checkout</button>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            cart: []
        }
    },

    created: function() {
        this.cart = this.$store.state.items
    },

    methods: {
        placeOrder: function() {
            axios
                .post("/api/order", this.cart)
                .then((response) => {
                    console.log(response);
                    window.location.href = "#/receipt"
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
}
</script>