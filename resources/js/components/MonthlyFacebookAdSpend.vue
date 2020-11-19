<template>
    <div>
        <h3>Monthly Ad Spending</h3>
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
                <label for="months">Month</label>
                <select class="form-control" name="months" id="months"
                        v-model="selectedMonth"
                        @change="updateSelectedMonth(selectedMonth)"
                >
                    <option v-for="(month, key) in months" :value="key" :selected="selectedMonth">{{month}}</option>

                </select>
            </div>
            <div class="form-group w-50 mr-2">
                <label for="category">Ad Category</label>
                <select class="form-control" name="categories" id="categories"
                        v-model="selectedCategory"
                        @change="updateSelectedCategory(selectedCategory)"
                >
                    <option value="0" :selected="selectedCategory">All</option>
                    <option v-for="category in categories" :value="category.id" :selected="selectedCategory">{{category.name}}</option>
                </select>
            </div>
        </div>
        <span v-if="!monthlySpend || isLoading" style="color: #D0237A">Loading... </span>
        <span v-else class="h1"  style="color: #D0237A">{{monthlySpend}}</span>
    </div>
</template>

<script>
export default {
    name: "MontlyFacebookAdSpend.vue",
    data() {
        return {
            selectedYear: '',
            selectedMonth: '',
            selectedCategory: 0,
            monthlySpend: null,
            years: null,
            months: null,
            categories: null,
            latestAd: null,
            isLoading: false,
        }
    },
    watch: {
        adSpendCall() {
            this.getAdSpend();
        }
    },
    computed: {
      adSpendCall(){
          return '/facebookadspending/' + this.selectedYear + '/' + this.selectedMonth + '/' + this.selectedCategory;
      }
    },
    methods: {
        updateSelectedYear(selectedYear) {
            return this.selectedYear = selectedYear;
        },
        updateSelectedMonth(selectedMonth) {
            return this.selectedMonth = selectedMonth;
        },
        updateSelectedCategory(selectedCategory) {
            return this.selectedCategory = selectedCategory;
        },
        getAdSpend() {
            this.isLoading = true;
            const that = this;
            axios.get(this.adSpendCall)
            .then((response) => {
                that.monthlySpend = response.data;
                that.isLoading = false;
            }).catch((err) => {
                console.log(err);
            })
        },
        getAdCategories() {
            const that = this;
            axios.get('/adcategories')
            .then((response) => {
                that.categories = response.data;
            })
            .catch((err) => {
                console.log(err);
            })
        },
        getAdYears() {
            const that = this;
            axios.get('/adyears')
            .then((response) => {
                that.years = response.data;
            })
            .catch((err) => {
                console.log(err);
            })
        },
        getAdMonths() {
            const that = this;
            axios.get('/admonths')
            .then((response) => {
                that.months = response.data;
            })
            .catch((err) => {
                console.log(err);
            })
        },
        getLatestAd() {
            const that = this;
            axios.get('/latestad')
            .then((response) => {
                that.selectedYear = response.data.year;
                that.selectedMonth = response.data.month;
            })
            .catch((err) => {
                console.log(err);
            })
        }

    },
    created() {


    },
    mounted() {
        // this.selectedYear = this.latestAd.year;
        this.getLatestAd();
        this.getAdCategories();
        this.getAdYears();
        this.getAdMonths();
        this.getAdSpend();

    }
}
</script>

<style scoped>

</style>
