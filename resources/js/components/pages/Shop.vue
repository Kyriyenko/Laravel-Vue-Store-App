<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <nav class="nav flex-column">
                        <a class="nav-link active" aria-current="page" href="#" v-on:click="getAllProducts">All</a>
                        <a class="nav-link" href="#" v-on:click="getMaxPriceFirst">Max price first</a>
                        <a class="nav-link" href="#" v-on:click="getMinPriceFirst">Min price first</a>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div v-for="product in products" class="col-md-4">
                            <div class="item">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                            <img
                                                style="height: 340px"
                                                src="http://html.lionode.com/darklook/images/product/product9-1.jpg"
                                                class="img-fluid" alt="Logo">
                                    </div>
                                    <div class="caption product-detail text-center">
                                        <div class="rating">
                                    <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    </span>
                                            <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    </span>
                                            <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    </span>
                                            <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                        <i class="fa fa-star fa-stack-1x"></i>
                                    </span>
                                            <span class="fa fa-stack">
                                        <i class="fa fa-star-o fa-stack-1x last-star"></i>
                                        <i class="fa fa-star fa-stack-x last-star"></i>
                                    </span>
                                        </div>
                                            <div  class="title-link mt-2" v-on:click="relocateToProduct(product.id)"
                                               title="Casual Shirt With Ruffle Hem">
                                                {{ product.title }}
                                            </div>
                                        <span class="price mt-1">
                                    <span class="amount">
                                        <span class="currencySymbol">
                                            $
                                        </span>
                                        {{ product.price }}
                                    </span>
                                 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import router from "../../router";
import userService from "../../services/userService";

export default {
    name: "Shop",
    data() {
        return {
            products: [],
            category: ''
        }
    },
    created() {
        this.getAllProducts()
    },
    methods: {
        getAllProducts() {
            userService.getAllProducts().then(response => {
                this.products = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        getMinPriceFirst() {
            userService.getMinPriceFirst().then(response => {
                this.products = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        getMaxPriceFirst() {
            userService.getMaxPriceFirst().then(response => {
                this.products = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        relocateToProduct(productId) {
            sessionStorage.setItem('product_id', productId)
            router.replace('/product')
        },
        getPrice(price) {
            return price + '$';
        }
    }
}
</script>

<style scoped>

.row {
    display: flex;
}

.title-link{
    cursor: pointer;
    color: #9e9e9e;
}

.nav-link {
    color: #fa4251;
    font-size: large;
    border-bottom: 1px dotted #fa4251;
    text-transform: uppercase;
    font-family: sans-serif;
}

.nav-link:hover {
    color: #8d3239;
    border-bottom: 1px dotted #8d3239;
}

.product-imageblock{
    display: flex;
    justify-content: center;
}

h4 {
    text-transform: uppercase;
}

i{
    color: #fa4251;
}

.last-star{
    color: #ffffff;
}


</style>
