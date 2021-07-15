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
                        <div v-for="product in products" class="col-md-4 mt-2 mb-2">
                            <div>
                                <div class="card">
                                    <img src="https://cdn.pixabay.com/photo/2017/03/03/04/31/clock-2113254_960_720.jpg"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4 class="card-text
                                         card-title-text"
                                            v-on:click="relocateToProduct(product.id)"
                                        >
                                            {{ product.title }}
                                        </h4>
                                        <p class="card-text">{{ getPrice(product.price) }}</p>
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

.card {
    background-color: #1b1e21;
}

.card-body {
    background-color: #1b1e21;
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

.card-title-text {
    font-family: 'Nunito', sans-serif;
    color: #b0b0b0;
}

.card-title-text:hover {
    color: #8f8f8f;
    cursor: pointer;
}

h4 {
    text-transform: uppercase;
}


</style>
