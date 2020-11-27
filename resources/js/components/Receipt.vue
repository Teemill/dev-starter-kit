<template>
    <div class="center">
        <div>
            <img src="/storage/icons/checkbox.png">
        </div>
        <div>
            <i>Thank you, your order has been placed.</i>
        </div>
        <h1>Receipt:</h1>
        <h2>Cars</h2>
        <table>
            <tr class="selectable" v-for="(order, index) in car_orders" :key="index">
                <router-link :to="'/cars/get/' + order.id" tag="td">{{ order.name }}</router-link>
            </tr>
        </table>
        <router-link tag="button" class="button" to="/">Return to homepage</router-link>
    </div>
</template>

<script>
export default {
    props: ["order_id"],

    data: function() {
        return {
            car_orders: []
        }
    },

    created: function() {
        this.fetchReceipt();
    },

    methods: {
        fetchReceipt() {
            axios
                .get("/api/orders/" + this.order_id)
                .then((response) => {
                    console.log(response);
                    this.car_orders = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>

