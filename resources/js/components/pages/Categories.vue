<template>
    <div>
        <div class="container">
            <div  class="row">
                <div  v-for="product in products" class="col-md-6 mt-2 mb-2">
                    <div>
                        <div class="card">
                            <img src="https://cdn.pixabay.com/photo/2017/03/03/04/31/clock-2113254_960_720.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h2 class="card-text">{{product.title}}</h2>
                                <p class="card-text">{{product.description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Shop",
    data(){
        return{
            products:[],
            category:''

        }
    },
    created() {
        this.category=sessionStorage.getItem('category')
        axios
            .get(`/getProducts/${this.category}`)
            .then(response => {
                this.products=response.data
            })
            .catch(error => console.log(error))
            .finally()
    }

}
</script>

<style scoped>

.row{
    display: flex;
    flex-direction: row-reverse;
}

.card{
    background-color: #1b1e21;
}

</style>
