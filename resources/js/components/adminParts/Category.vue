<template>
    <div>
        <div class="mb-4 mt-3">
            <form>
                <div class="form-header">
                    <h4>Create Category</h4>
                </div>
                <div class="form-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput112" class="form-label">Category name</label>
                        <input type="text" class="form-control" v-model="title" id="exampleFormControlInput112"
                               placeholder="category name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select v-model="collectionId" class="form-select" aria-label="Default select example">
                            <option v-for="collection in collections" :value="collection.id">
                                {{ collection.title }}
                            </option>
                        </select>
                        <button type="button" v-on:click="createSubCategory" class="btn btn-warning mt-2">CREATE
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <hr class="dropdown-divider">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Category</th>
                <th scope="col">Collection</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories">
                <td>{{ category.category }}</td>
                <td>{{ category.collection }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import adminService from "../../services/adminService";
export default {
    name: "Category",
    data() {
        return {
            categories: [],
            collections: [],
            collectionId: '',
            title: '',
        }
    },
    created() {
        this.getCategories()
        this.getCollection()
    },
    methods: {
        getCategories() {
            adminService.getCategories().then(response => {
                this.categories = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        getCollection() {
            adminService.getCollection().then(response => {
                this.collections = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        createSubCategory() {
            adminService.createSubCategory({category_id: this.collectionId, title: this.title}).then(response => {
                if (response.data.status === true) {
                    this.title = ''
                    this.collectionId = ''
                    this.getCategories()
                }
            })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

option {
    color: #1d2124;
}

</style>
