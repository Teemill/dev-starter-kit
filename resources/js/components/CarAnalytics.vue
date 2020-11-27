<template>
    <div>
        <button class="button" @click="setToFuelTypeData">Fuel type</button>
        <button class="button" @click="setToManufacturerData">Manufacturer</button>
        <button class="button" @click="setToTotalOrdersData">Total orders</button>
        <button class="button" @click="setToOrdersOverTime">Orders over time</button>
        <button class="button" @click="setToSearchPopularity">Most popular searches</button>
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';
    
    export default {
        props: ["model_name"],

        data: function() {
            return {
                chart: null,
                chartStarted: false,
                property: "fuel_types",
                data_style: "",
                chart_type: "bar",
                labels: [],
                datasets: [{
                    label: "Number of Cars",
                    data: []
                }]
            }
        },

        mounted: function() {
            this.fetchData();
        },

        methods: {
            setToFuelTypeData: function() {
                this.chart_type = "bar";
                this.datasets.label = "Number of Cars";
                this.property = "fuel_types";
                this.data_style = "";
                this.resetData();
                this.fetchData();
            },

            setToManufacturerData: function() {
                this.chart_type = "bar";
                this.datasets.label = "Number of Cars";
                this.property = "manufacturers";
                this.data_style = "";
                this.resetData();
                this.fetchData();
            },

            setToTotalOrdersData: function() {
                this.chart_type = "bar";
                this.datasets.label = "Number of Orders";
                this.property = "orders";
                this.data_style = "total";
                this.resetData();
                this.fetchData();
            },

            setToOrdersOverTime: function() {
                this.chart_type = "line";
                this.datasets.label = "Number of Orders";
                this.property = "orders";
                this.data_style = "over_time";
                this.resetData();
                this.fetchData();
            },

            setToSearchPopularity: function() {
                this.chart_type = "bar";
                this.datasets.label = "Number of Searches";
                this.property = "searches";
                this.data_style = "most_popular";
                this.resetData();
                this.fetchData();
            },

            resetData: function() {
                this.labels = [];
                this.datasets[0].data = [];
            },

            fetchData: function() {
                axios
                    .get("/api/" + this.property + "/data/" + this.data_style)
                    .then((response) => {
                        console.log(response.data);
                        for (let i = 0; i < response.data.length; i++) {
                            console.log(response.data[i])
                            this.labels.push(response.data[i].name);
                            this.datasets[0].data.push(response.data[i].count);
                        }
                        this.startCharts();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },

            startCharts: function() {
                if (this.chartStarted) {
                    this.chart.destroy();
                }
                var ctx = document.getElementById('myChart');
                this.chart = new Chart(ctx, {
                    type: this.chart_type,
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: this.datasets[0].label,
                            data: this.datasets[0].data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                this.chartStarted = true;
            }
        }
    }
</script>