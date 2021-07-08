<template>
    <div>
        <div v-if="isBannerUpdated" class="alert alert-success" role="alert">
            Banner updated
        </div>
        <div class="card bg-dark text-white">
            <label>Banner link</label>
           <input type="text" v-model="banner.link">
            <label>Banner header</label>
            <input type="text" v-model="banner.description">
            <button v-on:click="updateBanner" type="button" class="btn btn-danger mt-2">UPDATE</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Banner",
    data(){
        return{
            banner:{},
            isBannerUpdated:false,
        }
    },
    created() {
        this.getBanner()
    },
    methods:{
        getBanner(){
            axios
                .get('/banner')
                .then(response => {
                    this.banner=response.data
                })
                .catch(error => console.log(error))
                .finally()
        },
        updateBanner(){
            this.isBannerUpdated=false
            axios
                .post('/banner/update',this.banner)
                .then(response => {
                    if(response.data.status===true){
                        this.getBanner()
                        this.isBannerUpdated=response.data.status===true
                    }
                })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

input{
    color: black;
}

.btn-danger{
    background-color: #fa4251;
}

</style>
