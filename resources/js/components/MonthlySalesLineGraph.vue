
<script>
import {Bar, mixins} from 'vue-chartjs';
const {reactiveProp} = mixins
export default {
    extends: Bar,
    name: "MonthlySalesLineGraph.vue",
    mixins: [reactiveProp],
    data () {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks : {
                            beginAtZero: true,
                        }
                    }]
               }
            }
        }
    },
    mounted () {
        this.renderChart(this.chartData, this.options);
    }
}
</script>

<style scoped>

</style>
