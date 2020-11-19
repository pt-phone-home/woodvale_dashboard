<template>
    <div>
        <h3>Monthly Unit Sales by Product</h3>
        <div class="d-flex">
            <div class="form-group w-50 mr-2">
                <label for="years">Year</label>
                <select class="form-control" name="years" id="years"
                        v-model="selectedYear"
                        @change="updateSelectedYear(selectedYear)"
                >
                    <option v-for="year in years" :value="year" :selected="selectedYear">{{year}}</option>
                </select>
            </div>
            <div class="form-group w-50 mr-2">
                <label for="products">Product(s)</label>
                <select class="form-control" name="products" id="years"
                        v-model="selectedProduct"
                        @change="updateSelectedProduct(selectedProduct)"
                >
                    <option value="0" :selected="selectedProduct">All</option>
                    <option v-for="product in products" :value="product.id" :selected="selectedProduct">{{product.name}}</option>

                </select>
            </div>
        </div>
        <div>
            <p v-if="!chartData || isLoading"  style="color: #D0237A"> Loading... </p>
            <unit-sales-bar-graph v-else
                                    :chart-data="chartData"
            ></unit-sales-bar-graph>
        </div>
    </div>

</template>

<script>
import UnitSalesBarGraph from "./UnitSalesBarGraph";
export default {
    components: {
        UnitSalesBarGraph,
    },
    name: "MonthlyProductUnitSales.vue",
    data () {
        return {
            years: '',
            selectedYear: 2020,
            products: null,
            productIds: null,
            selectedProduct: 0,
            chartData: null,
            isLoading: false,
        }
    },
    watch: {
        selectedProduct(value) {
            if (value == 0) {
                this.getProductUnitSalesByMonth()
            } else {
                this.getProductUnitSalesByMonth(value);
            }
        },
        selectedYear() {
            this.getProductUnitSalesByMonth();
        }
    },
    methods: {
        updateSelectedProduct(selectedProduct) {
            this.selectedProduct = selectedProduct;
        },
        updateSelectedYear(selectedYear) {
          this.selectedYear = selectedYear;
        },
        getCurrentYear() {
            const that = this;
            axios.get('/months').then((response) => {
                that.selectedYear = response.data.current_year;
            }).catch((err) => {
                console.log(err);
            })
        },
        getProductUnitSalesByMonth(id = 0) {
            this.isLoading = true;
            const that = this;
            axios.get('/salesbymonth/' + this.selectedYear + '/' + id)
                .then((response) => {
                    that.chartData = {
                        labels: response.data.month_pairs.map((data) => { for (const key in data) {return data[key]} }),
                        datasets: [{
                            label: 'Monthly Unit Sales',
                            data: response.data.unit_sales,
                            backgroundColor: '#D0237A',
                        }]
                    }
                    that.isLoading = false;
                });
        },
        getAllProductsIds() {
            const that = this;
            axios.get('/allproducts').then((response) => {
                that.products = response.data;
                that.productIds = response.data.map((p) => {return p.id});
            }).catch((err) => {
                console.log(err);
            })
        },
        getYears() {
            const that = this;
            axios.get('/months')
                .then((response) => {
                    that.years = response.data.years_ordered;
                }).catch((err) => {
                console.log(err);
            })
        },

    },
    created () {
        this.getCurrentYear();
        this.getYears();
        this.getAllProductsIds();

    },
    mounted() {
        this.getProductUnitSalesByMonth();
    }
}
</script>

<style scoped>

</style>
