<template>
    <div>
        <form>
            <div class="form-header">
                <div v-if="isCreatedSuccessfully" class="alert alert-success" role="alert">
                    {{ serverMessage }}
                </div>
                <h4>CREATE PRODUCT</h4>
            </div>
            <div class="form-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input v-model="title" type="text" class="form-control" id="exampleFormControlInput1"
                           placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Description</label>
                    <input v-model="description" type="text" class="form-control" id="exampleFormControlInput2"
                           placeholder="description">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Price</label>
                    <input v-model="price" type="text" class="form-control" id="exampleFormControlInput3"
                           placeholder="price">
                </div>
                <div class="mt-3  mb-5">
                    <label class="form-label">Category</label>
                    <select v-model="categoryId" class="form-select" aria-label="Default select example">
                        <option v-for="category in categories" :value="category.id">
                            {{ category.category }} || {{ category.collection }}
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-warning" v-on:click="createProduct">CREATE PRODUCT</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import adminService from "../../services/adminService";
export default {
    name: "CreationPage",
    data() {
        return {
            categoryId: '',
            categories: [],
            title: '',
            description: '',
            price: '',
            serverMessage: '',
            isCreatedSuccessfully: false
        }
    },
    created() {
        this.getCategories()
    },
    methods: {
        createProduct() {
            this.serverMessage = ''
            this.isCreatedSuccessfully = false
            adminService.createProduct({
                categoryId: this.categoryId,
                title: this.title,
                description: this.description,
                price: this.price
            }).then(response => {
                if (response.data.status === true) {
                    this.serverMessage = response.data.message
                    this.isCreatedSuccessfully = true
                    this.title = ''
                    this.description = ''
                    this.price = ''
                    console.log(response)
                }
            })
                .catch(error => console.log(error))
                .finally()
        },
        getCategories() {
            adminService.getCategories().then(response => {
                this.categories = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
    }
}
</script>

<style scoped>
option {
    color: #020202;
}

</style>
