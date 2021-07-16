<template>
    <div>
        <div class="container">
            <div class="col-sm-8 col-lg-9 mtb_20">
                <div class="row mt_10 ">
                    <div class="col-md-6">
                        <div>
                            <a class="thumbnails">
                                <img class="img img-fluid" style="height: 500px; width: 80%" data-name="product_image"
                                     src="http://html.lionode.com/darklook/images/product/product1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 prodetail caption product-thumb ">
                        <h4 data-name="product_name" class="product-name">
                            <a href="#" title="Casual Shirt With Ruffle Hem">
                                {{ product.title }}
                            </a>
                        </h4>
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
                        <span class="price mb_20">
                            <span class="amount">
                                <span class="currencySymbol">$</span>
                                {{ product.price }}
                            </span>
                        </span>
                        <hr>
                        <ul class="list-unstyled product_info mtb_20">
                            <li>
                                <label>Brand:</label>
                                <span> <a href="#">Apple</a></span>
                            </li>
                            <li>
                                <label>Product Code:</label>
                                <span> product 20</span>
                            </li>
                            <li>
                                <label>Availability:</label>
                                <span> In Stock</span>
                            </li>
                        </ul>
                        <hr>
                        <p class="product-desc mtb_30"> More room to move. With 80GB or 160GB of storage and up to 40
                            hours
                            of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours
                            of
                            video or any combination wherever you go. Cover Flow. Browse through your music collection
                            by
                            flipping..</p>
                        <div class="row">
                            <button type="button" class="btn btn-danger mb-3" v-on:click="buyProduct">
                                Add to Shopping Cart
                            </button>
                            <div v-if="isAddToCart" class="alert alert-success mt-3" role="alert">
                                {{ serverMessage }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import userService from "../../services/userService";
import authService from "../../services/authService";
import router from "../../router";

export default {
    name: "Product",
    data() {
        return {
            product: [],
            productId: '',
            isAddToCart: false,
            serverMessage: '',
            role: ''
        }
    },
    created() {
        this.getUserStatus()
        this.getProduct()
    },
    methods: {
        getUserStatus() {
            authService.getUserStatus().then(response => {
                this.role = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        getProduct() {
            let productId = sessionStorage.getItem('product_id')
            userService.getOneProduct(productId).then(response => {
                this.product = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        buyProduct() {
            if (this.role === 'guest') {
                router.replace('/login')
                return;
            }
            this.isAddToCart = false
            let productId = sessionStorage.getItem('product_id')
            userService.buyProduct({product_id: productId}).then(response => {
                if (response.data.status === true) {
                    this.isAddToCart = true
                    this.serverMessage = response.data.message
                }
            })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

* {
    font-family: sans-serif;
}

a{
    color: #888888;
    text-decoration: none;
    text-transform: uppercase;
}

p {
    color: #5e646a;
}

.btn-danger {
    background-color: #ff4352;
}

.container {
    display: flex;
    justify-content: center;
}

i{
    color: #fa4251;
}

.last-star{
    color: #ffffff;
}

</style>
