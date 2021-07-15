<template>
    <div>

        <div class="container mb-5">
            <div class="heading-part mb_10 mb-3">
                <h2 class="main_title">Featured Products</h2>
            </div>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div v-for="product in products" class="col-md-4">
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock">
                                <div>
                                    <img
                                        style="height: 340px"
                                        src="http://html.lionode.com/darklook/images/product/product4-1.jpg"
                                        class="img-fluid" alt="Logo">
                                </div>
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
                                        <i class="fa fa-star-o fa-stack-1x"></i>
                                        <i class="fa fa-star fa-stack-x"></i>
                                    </span>
                                </div>
                                <h6 data-name="product_name" class="product-name">
                                    <a href="#" title="Casual Shirt With Ruffle Hem">
                                       {{product.title}}
                                    </a>
                                </h6>
                                <span class="price">
                                    <span class="amount">
                                        <span class="currencySymbol">
                                            $
                                        </span>
                                        {{product.price}}
                                    </span>
                                 </span>
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
export default {
    name: "FeaturedProducts",
    data(){
        return{
            products:[]
        }
    },
    created() {
        this.getFeaturedProducts()
    },
    methods:{
        getFeaturedProducts() {
            userService.getFeaturedProducts().then(response => {
               this.products=response.data
            })
                .catch(error => console.log(error))
                .finally()
        },


    }
}
</script>

<style scoped>

.heading-part {
    border-bottom: 2px solid #424242;
}

a{
    text-decoration: none;
    color: #9e9e9e;
}

</style>
