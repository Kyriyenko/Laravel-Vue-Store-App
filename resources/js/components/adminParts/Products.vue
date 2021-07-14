<template>
    <div>
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">All products
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Create product
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="row content">
                                <div v-for="product in products" class="col mt-2 mb-2">
                                    <div class="product-item">
                                        <div class="mt-2">TITLE</div>
                                        <input class="mt-2" type="text" v-model="product.title">
                                        <div class="mt-2">DESCRIPTION</div>
                                        <input class="mt-2" type="text" v-model="product.description">
                                        <div class="mt-2">PRICE</div>
                                        <input class="mt-2" type="text" v-model="product.price">
                                        <div class="btn-box mt-3">
                                            <button type="button" class="btn btn-success"
                                                    v-on:click="updateProductInfo(product)">SAVE CHANGES
                                            </button>
                                            <button type="button" class="btn btn-delete"
                                                    v-on:click="deleteProduct(product.id)">DELETE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <v-creationProduct></v-creationProduct>
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
    },
    methods: {
        updateProductInfo(product) {
            axios
                .post(`/updateProduct`, product)
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => console.log(error))
                .finally()
        },
        deleteProduct(id) {
            axios
                .post(`/deleteProduct`, {id: id})
                .then(response => {
                    console.log(response.data)
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

.btn-delete {
    background-color: #424242;
}

.category-item {
    border-bottom: 1px solid #ffffff;
    cursor: pointer;
    text-transform: uppercase;
}

.category-item:hover {
    background-color: #424242;
}

.nav-link {
    color: #ffffff;
}


</style>
