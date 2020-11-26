<template>
    <div>
        <h1> New Car </h1>
        <div class="form-grid-container">
            <div class="form-grid-middle">
                <label for="name">Name: </label>
            </div>
            <div class="form-grid-middle">
                <input type="text" id="name" name="name" v-model="formData.name">
            </div>
            <div class="form-grid-middle">
                <label for="manufacturer">Manufacturer: </label>
            </div>
            <div class="form-grid-middle">
                <select id="manufacturer" v-model="formData.manufacturer_id">
                    <option v-for="manufacturer in manufacturers" :key="manufacturer.id" :value="manufacturer.id">{{manufacturer.name}}</option>
                </select>
            </div>
            <div class="form-grid-middle">
                <label for="fuel_type">Fuel type: </label>
            </div>
            <div class="form-grid-middle">
                <select id="fuel_type" v-model="formData.fuel_type_id">
                    <option v-for="fuel_type in fuel_types" :key="fuel_type.id" :value="fuel_type.id">{{fuel_type.name}}</option>
                </select>
            </div>
            <div class="form-grid-middle">
                <label for="seats">Number of doors: </label>
            </div>
            <div class="form-grid-middle">
                <input type="text" id="doors" name="doors" v-model="formData.doors">
            </div>
            <div class="form-grid-middle">
                <label for="seats">Number of seats: </label>
            </div>
            <div class="form-grid-middle">
                <input type="text" id="seats" name="seats" v-model="formData.seats">
            </div>
            <div class="form-grid-middle">
                <label for="top_speed">Top speed: </label>
            </div>
            <div class="form-grid-middle">
                <input type="text" id="top_speed" name="top_speed" v-model="formData.top_speed">
            </div>
            <div class="form-grid-middle">
                <label for="password">Password: </label>
            </div>
            <div class="form-grid-middle">
                <input type="password" id="password" name="password" v-model="formData.password">
            </div>
            <div class="form-grid-middle center">
                <button class="button" @click="submitForm">Add car</button>
            </div>
            <div class="form-grid-right">
                </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["model_name"],

    data: function() {
        return {
            manufacturers: [],
            fuel_types: [],
            formData: {
                    name: "",
                    manufacturer_id: "",
                    fuel_type_id: "",
                    doors: "",
                    seats: "",
                    top_speed: "",
                    password: ""
            }
        }
    },

    created: function() {
        this.getManufacturers();
        this.getFuelTypes();
    },

    methods: {
        getManufacturers: function() {
            axios
                .get("/api/manufacturers/list")
                .then((response) => {
                    this.manufacturers = response.data;
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        getFuelTypes: function() {
            axios
                .get("/api/fuel_types/list")
                .then((response) => {
                    this.fuel_types = response.data;
                })
                .catch()
        },

        submitForm: function() {
            console.log(this.formData);
            axios
                .post("/api/cars/add", this.formData)
                .then((response) => {
                    console.log(response);
                    window.location.href = "#/" + this.model_name + "/list"
                })
                .catch((error) => {
                    console.log(error);
                })
        },

        validateForm: function() {
            for (let [key, value] of this.formData) {
                // should validate each value based on key, return true if all validate,
                // else return false and set an error message to display
            }
        }
    },

    computed: {
        formattedModelName: function() {
            return this.model_name.charAt(0).toUpperCase() + this.model_name.slice(1);
        }
    }
}
</script>