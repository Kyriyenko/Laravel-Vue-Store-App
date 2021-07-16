<template>
    <div>
        <div class="container">
            <div class="row">
                <div v-for="product in products" class="col-md-4 mt-3 mb-2">
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
                            <div class="title-link mt-2"
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
</template>

<script>
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
        this.setCategory()
        this.getSelectedCategoriesProducts()
    },
    methods: {
        setCategory() {
            this.category = sessionStorage.getItem('category')
        },
        getSelectedCategoriesProducts() {
            userService.getSelectedCategoriesProducts(this.category).then(response => {
                this.products = response.data
            })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

.row {
    display: flex;
}

.product-imageblock {
    display: flex;
    justify-content: center;
}

.title-link {
    color: #4f4f4f;
    text-transform: uppercase;
}

i {
    color: #fa4251;
}

.last-star {
    color: #ffffff;
}

</style>
