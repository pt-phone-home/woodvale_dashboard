<template>
   <div>
       <h3 class="">Monthly Totals</h3>
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
           <div class="form-group w-50">
               <label for="months">Month</label>
               <select class="form-control" name="months" id="months"
                       v-model="selectedMonth"
                       @change="updateSelectedMonth(selectedMonth)"
               >
                   <option v-for="(month, key) in months" :value="key" :selected="selectedMonth">{{month}}</option>
               </select>
           </div>
       </div>
       <div class="mt-1">
           <h4 class="text-muted h6">Monthly Sales for {{displayMonth}} {{selectedYear}}</h4>
           <p v-if="!selectedMonthTotalSales || isLoading" style="color: #D0237A">Loading... </p>
           <span v-else class="h1" style="color: #D0237A"> {{selectedMonthTotalSales}}</span>
       </div>
       <div class="mt-3">
           <h4 class="text-muted h6">Monthly Unit Sales for {{displayMonth}} {{selectedYear}}</h4>
           <p v-if="!selectedMonthUnitSales || isLoading" style="color: #D0237A">Loading... </p>
           <span v-else class="h1" style="color: #D0237A"> {{selectedMonthUnitSales}}</span>
       </div>
   </div>
</template>

<script>
export default {
    name: "MonthlySales.vue",
    data () {
        return {
            months: [],
            selectedMonth: {},
            years: [],
            selectedYear: '',
            selectedMonthTotalSales: '',
            selectedMonthUnitSales:'',
            isLoading: false,
        }
    },
    methods: {
        updateSelectedYear(selectedYear) {
            this.selectedYear = selectedYear;
        },
        updateSelectedMonth(selectedMonth) {
          this.selectedMonth = selectedMonth;
        },
        getTotalSales() {
            const that = this;
            this.isLoading = true;
            axios.get(this.axiosMonthlySales)
                .then((response) => {
                    that.selectedMonthTotalSales =  response.data
                    that.isLoading = false;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getMonthlyUnits() {
            const that = this;
            this.isLoading = true
            axios.get(this.axiosMonthlyUnits)
                .then((response) => {
                    that.selectedMonthUnitSales = response.data;
                    that.isLoading = false;
                })
                .catch((err) => {
                    console.log(err)
                })
        },
    },
    watch: {
        axiosMonthlySales() {
            this.getTotalSales();
            this.getMonthlyUnits();
        },
        axiosMonthlyUnits() {
            this.getTotalSales();
            this.getMonthlyUnits();
        }
    },
    computed: {
        displayMonth() {
            return this.months[this.selectedMonth];
        },
        axiosMonthlySales() {
            return '/monthlysales/' + this.selectedYear + '/' + this.selectedMonth;
        },
        axiosMonthlyUnits() {
            return '/monthlyunits/' + this.selectedYear + '/' + this.selectedMonth;
        },
        getMonths() {
            const that = this;
            axios
            .get('/months')
            .then((response) => {
                that.months = response.data.months_ordered;
            })
            .catch((err) => {
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
        getCurrentMonth() {
            const that = this;
            axios
                .get('/months')
                .then((response) => {
                    that.selectedMonth = response.data.current_month
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        getCurrentYear() {
            const that = this;
            axios.get('/months').then((response) => {
                that.selectedYear = response.data.current_year;
            }).catch((err) => {
                console.log(err);
            })
        }

    },
    created() {
        this.getMonths;
        this.getCurrentMonth;
        this.getYears;
        this.getCurrentYear;
    },
    mounted() {
        this.getTotalSales();
        this.getMonthlyUnits();
    }

}
</script>

<style scoped>

</style>
