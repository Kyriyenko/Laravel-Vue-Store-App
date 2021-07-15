<template>
    <div>
        <div class="container">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                CREATE NEWS
            </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <label class="mb-2">CREATE NEWS</label>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="mb-2">News title</label>
                                <input type="text" class="form-control" v-model="title" id="exampleInputName1"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="mb-2">News body</label>
                                <textarea type="text" class="form-control" v-model="body"
                                          id="exampleInputPassword1"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="addNews" type="button" class="btn btn-primary btn-create"
                                    aria-label="Close" data-bs-dismiss="modal">CREATE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="card in news" class="col-md-6 mt-3 mb-3">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-text">{{ card.title }}</h2>
                            <p class="card-text">{{ card.description }}</p>
                            <button v-on:click="deleteNews(card.id)" type="button" class="btn btn-danger">Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import adminService from "../../services/adminService";

export default {
    name: "News",
    data() {
        return {
            news: [],
            title: '',
            body: '',
        }
    },
    created() {
        this.getNews()
    },
    methods: {
        getNews() {
            adminService.getNews().then(response => {
                this.news = response.data
            })
                .catch(error => console.log(error))
                .finally()
        },
        deleteNews(id) {
            adminService.deleteNews({id: id}).then(response => {
                if (response.data.status === true) {
                    this.getNews()
                }
            })
                .catch(error => console.log(error))
                .finally()
        },
        addNews() {
            adminService.addNews({title: this.title, body: this.body}).then(response => {
                if (response.data.status === true) {
                    this.getNews()
                }
            })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>


.card {
    background-color: #010302;
    padding: 15px;
    border: 2px solid #424242;
}

.btn {
    background-color: #fb4250;
    color: #ffffff;
    border: none;
}

label {
    color: #010302;
}

</style>
