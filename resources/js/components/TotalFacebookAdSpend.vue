<template>
    <div>
        <h3>Total Ad Spend</h3>
        <span v-if="!totalSpend" style="color: #D0237A">Loading... </span>
        <span v-else class="h1"  style="color: #D0237A">€{{totalSpend}}</span>
    </div>
</template>

<script>
export default {
    name: "TotalFacebookAdSpend.vue",
    data () {
        return {
            totalSpend: null,
        }
    },
    methods: {
        getTotalAdSpend() {
            const that = this;
            axios.get('/totaladspend')
            .then((response) => {
                that.totalSpend = response.data;
            })
            .catch((err)  => {
                console.log(err)
            })
        }
    },
    mounted () {
        this.getTotalAdSpend();
    }
}
</script>

<style scoped>

</style>
