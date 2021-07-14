<template>
<div>
<div class="container">
    <div class="card mb-3" >
        <div class="row g-1">
            <div class="col-md-4">
                <img src="https://cdn.pixabay.com/photo/2017/03/03/04/31/clock-2113254_960_720.jpg" style="height: 235px; width: 100%" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ product.title }}</h5>
                    <p>{{ product.description }}</p>
                    <p class="card-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                    <div class="row">
                        <h6 class="card-text">PRICE:{{product.price}}$</h6>
                        <button type="button" class="btn btn-danger" v-on:click="buyProduct">Add to Shopping Cart</button>
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
    name: "Product",
    data(){
        return{
            product:[],
            productId:''
        }
    },
    created() {
        this.getProduct()
    },
    methods:{
        getProduct(){
            let productId=sessionStorage.getItem('product_id')
            axios
                .get(`/getOneProduct/${productId}`)
                .then(response => {
                    this.product=response.data
                })
                .catch(error => console.log(error))
                .finally()
        },
        buyProduct(){
            let productId=sessionStorage.getItem('product_id')
            axios
                .post(`/buyProduct`,{product_id:productId})
                .then(response => {
                    console.log(response)
                })
                .catch(error => console.log(error))
                .finally()
        }

    }

}
</script>

<style scoped>

*{
    font-family: sans-serif;
}

.col-md-8{
    background-color: #424242;
}

.card-title{
    text-transform: uppercase;
}
p{
    color: #5e646a;
}

.btn-danger{
    background-color: #ff4352;
}

</style>
