<template>
    <div>
        <h3>Total Sales by Region</h3>
        <p v-if="salesByRegion <= 0" style="color: #D0237A">Loading... </p>
        <table v-else>
            <tbody>
                <tr v-for="sale in salesByRegion" :key="sale.name">
                    <td>{{sale.name}}</td>
                    <td style="color: #D0237A; font-size: 1.1rem">€{{sale.euro_sales}}</td>
                    <td style="color: #D0237A; font-size: 1.1rem">{{sale.unit_sales}}</td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
export default {
    name: "UnitSalesByRegion.vue",
    data () {
        return {
            salesByRegion: [],
        }
    },
    methods: {
        getSalesByRegion() {
            const that = this;
            axios.get('/salesbyregion')
            .then((response) => {
                that.salesByRegion = response.data;
            })
            .catch((err) => {
                console.log(err);
            })
        }
    },
    mounted() {
        this.getSalesByRegion();
    }
}
</script>

<style scoped>

</style>
