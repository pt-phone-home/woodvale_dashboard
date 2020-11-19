<template>
   <div>
       <h3 class="text-left">Total Sales</h3>
       <span v-if="!totalSalesValue" style="color: #D0237A">Loading... </span>
       <span v-else class="h1 text-left" style="color: #D0237A"> €{{totalSalesValue}}</span>
   </div>
</template>

<script>
export default {
    name: "TotalSales.vue",
    data () {
        return {
            totalSalesValue: '',
            isLoading: false,
        }
    },
    methods: {
        getTotalSalesValue() {
            const that = this;
            axios
                .get('/totalsales')
                .then(response => {
                    that.totalSalesValue = response.data;
                })
                .catch(err => {
                    console.log(err);
                })
        }
    },
    mounted() {
       //  const that = this;
       //  this.isLoading = true;
       // setTimeout(() => {that.getTotalSalesValue(); that.isLoading = false}, 500);
       this.getTotalSalesValue();

    }
}
</script>

<style scoped>

</style>
