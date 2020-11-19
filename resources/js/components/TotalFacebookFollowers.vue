<template>
    <div>
        <h3>FaceBook Followers</h3>
        <span v-if="!followers" style="color: #D0237A">Loading... </span>
        <span v-else class="h1"  style="color: #D0237A"> {{followers}}</span>
    </div>
</template>

<script>
export default {
    name: "TotalFacebookFollowers.vue",
    data () {
        return {
            followers: '',
        }
    },
    methods: {
        getFacebookFollowers() {
            const that = this;
            axios.get('/facebookfollwers')
            .then((response) => {
                that.followers = response.data;
            })
            .catch((err) => {
                console.log(err);
            })
        }
    },
    mounted() {
        this.getFacebookFollowers();
    }
}
</script>

<style scoped>

</style>
