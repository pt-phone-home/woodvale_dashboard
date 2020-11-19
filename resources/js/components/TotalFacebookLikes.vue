<template>
    <div>
        <h3>FaceBook Likes</h3>
        <span v-if="!likes" style="color: #D0237A">Loading... </span>
        <span v-else class="h1"  style="color: #D0237A"> {{likes}}</span>
    </div>
</template>

<script>
export default {
    name: "TotalFacebookLikes.vue",
    data () {
        return {
            likes: '',
        }
    },
    methods: {
        getFacebookLikes() {
            const that = this;
            axios.get('/facebooklikes')
                .then((response) => {
                    that.likes = response.data;
                })
                .catch((err) => {
                    console.log(err);
                })
        }
    },
    mounted() {
        this.getFacebookLikes();
    }
}
</script>

<style scoped>

</style>
