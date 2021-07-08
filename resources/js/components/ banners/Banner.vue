<template>
<div>
    <div class="card bg-dark text-white">
        <a href="/">
            <img :src="require('../../../../resources/images/left1.jpg').default"class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 style="color:#cac065; text-transform: uppercase" class="card-title">{{banner.description}}</h5>
            </div>
        </a>
    </div>
</div>
</template>

<script>
export default {
    name: "Banner",
    data(){
        return{
            banner:{}
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
        }
    }

}
</script>

<style scoped>

</style>
