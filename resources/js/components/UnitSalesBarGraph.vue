<script>
import {Bar, mixins} from 'vue-chartjs';
const {reactiveProp} = mixins
export default {
    name: "UnitSalesBarGraph.vue",
    extends: Bar,
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
