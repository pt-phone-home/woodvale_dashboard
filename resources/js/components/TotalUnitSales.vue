<template>
    <div>
        <h3>Total Unit Sales</h3>
        <span v-if="!unitSales" style="color: #D0237A">Loading... </span>
        <span v-else class="h1"  style="color: #D0237A"> {{unitSales}}</span>
    </div>
</template>

<script>
export default {
    name: "TotalUnitSales.vue",
    data () {
        return {
            unitSales: null,
            isLoading: false,
        }
    },
    methods: {
      getTotalUnitSales() {
          const that = this;
          axios
          .get('/totalunitsales')
          .then((response) => {
              that.unitSales = response.data;
          })
          .catch((err) => {
              console.log(err)
          })
      }
    },
    mounted() {
        // const that = this;
        // this.isLoading = true;
        // setTimeout(() => {that.getTotalUnitSales(); that.isLoading = false}, 500);
        this.getTotalUnitSales();
    }
}
</script>

<style scoped>

</style>
