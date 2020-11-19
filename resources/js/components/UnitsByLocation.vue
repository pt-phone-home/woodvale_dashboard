<template>
    <div>
        <h3>Sales By County</h3>
        <p v-if="!chartData" style="color: #D0237A">Loading... </p>
        <unit-pie-chart v-else :chart-data="chartData"></unit-pie-chart>
    </div>
</template>

<script>
import UnitPieChart from "./UnitPieChart";
export default {
    components: {
        UnitPieChart,
    },
    name: "UnitsByLocation.vue",
    data () {
        return {
            chartData: null,
        }
    },
    methods: {
        getUnitsByLocation() {
            const that = this;
            axios.get('/unitsbylocation')
            .then((response) => {
                that.units = response.data;
                that.chartData = {
                    labels: response.data.map((data) => {return data.name}),
                    datasets: [{
                        label: 'Monthly Unit Sales',
                        data: response.data.map((data) => {return data.units}),
                        backgroundColor: ['#D0237A', '#a5a2a8', '#b30e2f', '#f1c60c', '#d60e44', '#ee56ea', '#296329', '#a79574', '#ca7115',
                        '#86ffc2', '#e7fe67', '#24d484', '#d2f9e8', '#d90d0d', '#d66881', '#33e903', '#d87905', '#092e48', '#e2036d', '#168c0d',
                        '#eaa1c4', '#e05204', '#137932', '#682eea', '#9df56c', '#9c00da', '#61f7c6', '#27ab84', '#55d2b2', '#5ce8c4', '#20e094',
                        '#0a45f9'],
                    }]
                }
            })
        }
    },
    mounted() {
        this.getUnitsByLocation();
    }
}
</script>

<style scoped>

</style>
