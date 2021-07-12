<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row content">
                        <button type="button" class="btn btn-danger">CREATE PRODUCT</button>
                        <div v-for="product in products" class="col mt-2 mb-2">
                            <div class="product-item">
                                <div class="mt-2">TITLE</div>
                                <input class="mt-2" type="text" v-model="product.title">
                                <div class="mt-2">DESCRIPTION</div>
                                <input class="mt-2" type="text" v-model="product.description">
                                <div class="mt-2">PRICE</div>
                                <input class="mt-2" type="text" v-model="product.price">
                                <div class="btn-box mt-3">
                                    <button type="button" class="btn btn-success" v-on:click="updateProductInfo(product)">SAVE CHANGES</button>
                                    <button type="button" class="btn btn-delete" v-on:click="deleteProduct(product.id)">DELETE</button>
                                </div>
                                <hr class="dropdown-divider">
                                <div class="dropdown">
                                    <h3 class="mt-2">UPDATE COLLECTION</h3>
                                    <button class="btn btn-warning dropdown-toggle categories-toggle mt-2" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        COLLECTION
                                    </button>
                                    <ul class="dropdown-menu categories mt-2" aria-labelledby="dropdownMenuButton1">
                                        <div v-for="category in categories">
                                            <div class="category-item pb-2 pt-2">
                                                {{ category.category }}/{{ category.collection }}
                                            </div>
                                        </div>
                                    </ul>
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


export default {
    name: "Products",
    data() {
        return {
            products: [],
            category: '',
            categories: [],
            isDeletedMode: false,
        }
    },
    created() {
        this.getAllProducts()
        this.getCategories()
    },
    methods: {
        updateProductInfo(product){
            axios
                .post(`/updateProduct`,product)
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => console.log(error))
                .finally()
        },
        updateProductCollection(sub_category_id){

        },
        deleteProduct(id){
            axios
                .post(`/deleteProduct`,{id:id})
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => console.log(error))
                .finally()
        },
        getCategories() {
            axios
                .get(`/getAllCategories`)
                .then(response => {
                    this.categories = response.data
                })
                .catch(error => console.log(error))
                .finally()
        },
        getAllProducts() {
            axios
                .get(`/getAllProducts`)
                .then(response => {
                    console.log(response.data)
                    this.products = response.data
                })
                .catch(error => console.log(error))
                .finally()
        },
    }

}
</script>

<style scoped>

.row {
    display: flex;
}

.product-item {
    border: 1px solid #ffffff;
    padding: 10px;
}

h4 {
    text-transform: uppercase;
}

input {
    background-color: #000000;
}

ul {
    border: 1px solid #ffffff;
    background-color: #000000;
}

.btn-delete{
    background-color: #424242;
}

.category-item{
    border-bottom: 1px solid #ffffff;
    cursor: pointer;
    text-transform: uppercase;
}

.category-item:hover{
    background-color: #424242;
}




</style>
