<template>
    <div class="container">
        <h2 class="text-light pt-5 pb-3 border-bottom">Total Sales to Date</h2>
<!--        <hr style="border-color: #D0237A; border-width: 3px; width: 50%; display: inline-block">-->
        <div class="row mt-3 mb-2">
            <div class="col-lg-4 d-flex flex-column justify-content-between">
                <total-sales class="card px-4 py-4 rounded mt-2"></total-sales>
                <total-unit-sales class="card px-4 py-4 rounded mt-2"></total-unit-sales>
                <unit-sales-by-region class="card px-4 py-4 rounded mt-2"></unit-sales-by-region>
            </div>
            <div class="col-lg-8">
                <units-by-location class="card px-4 py-4 rounded mt-2"></units-by-location>
            </div>
        </div>
        <h2 class="text-light mt-4 pb-3 border-bottom">Monthly Details</h2>
        <div class="row">
            <div class="col-lg-6">
                <monthly-product-unit-sales class="card px-4 py-4 rounded mt-2"></monthly-product-unit-sales>
            </div>
            <div class="col-lg-6">
                <monthly-sales-graph class="card px-4 py-4 rounded mt-2"></monthly-sales-graph>
            </div>
            <div class="col-lg-6">
                <monthly-sales class="card px-4 py-4 rounded mt-2"></monthly-sales>
            </div>
        </div>
        <h2 class="text-light mt-4 pb-3 border-bottom">FaceBook Data</h2>
        <div class="row">
            <div class="col-lg-4">
                <total-facebook-followers class="card px-4 py-4 rounded mt-2"></total-facebook-followers>
            </div>
            <div class="col-lg-4">
                <total-facebook-likes class="card px-4 py-4 rounded mt-2"></total-facebook-likes>
            </div>
            <div class="col-lg-4">
                <total-facebook-ad-spend class="card px-4 py-4 rounded mt-2"></total-facebook-ad-spend>
            </div>
            <div class="col-lg-8">
                <monthly-facebook-ad-spend class="card px-4 py-4 rounded mt-2"></monthly-facebook-ad-spend>
            </div>
        </div>
    </div>
</template>

<script>
import TotalSales from "./components/TotalSales";
import TotalUnitSales from "./components/TotalUnitSales";
import MonthlySales from "./components/MonthlySales";
import MonthlySalesGraph from "./components/MonthlySalesGraph";
import MonthlyProductUnitSales from "./components/MonthlyProductUnitSales";
import UnitsByLocation from "./components/UnitsByLocation";
import UnitSalesByRegion from "./components/UnitSalesByRegion";
import TotalFacebookFollowers from "./components/TotalFacebookFollowers";
import TotalFacebookLikes from "./components/TotalFacebookLikes";
import TotalFacebookAdSpend from "./components/TotalFacebookAdSpend";
import MonthlyFacebookAdSpend from "./components/MonthlyFacebookAdSpend";
export default {
    components:{
        TotalSales,
        TotalUnitSales,
        MonthlySales,
        MonthlySalesGraph,
        MonthlyProductUnitSales,
        UnitsByLocation,
        UnitSalesByRegion,
        TotalFacebookFollowers,
        TotalFacebookLikes,
        TotalFacebookAdSpend,
        MonthlyFacebookAdSpend,
    },
    name: "App.vue",
}
</script>

<style scoped>

</style>
