<script>
import {Pie, mixins} from 'vue-chartjs';
const {reactiveProp} = mixins
export default {
    name: "UnitPieChart.vue",
    extends: Pie,
    mixins: [reactiveProp],
    data () {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                  display: false,
                },
                scales: {
                    yAxes: [{
                        display: false,
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
