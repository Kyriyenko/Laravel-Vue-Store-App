<template>
    <div>
        <div v-show="!isMessagesExist" class="alert alert-warning" role="alert">
            You have no messages
        </div>
        <table v-show="isMessagesExist" class="table">
            <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="message in messages">
                <td>{{ message.email }}</td>
                <td>{{ message.message }}</td>
                <td>
                    <button type="button" v-on:click="getUserMessage(message)" class="btn btn-warning"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">DETAILS
                    </button>
                    <button v-on:click=" deleteMessage(message.id)" type="button" class="btn btn-danger mt-2">DELETE
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div style="color:#000;" class="modal-body">
                        <div class="row">
                            <h5>Name</h5>
                            <p>{{ userMessage.name }}</p>
                        </div>
                        <div class="row">
                            <h5>Email</h5>
                            <p>{{ userMessage.email }}</p>
                        </div>
                        <div class="row">
                            <h5>Object</h5>
                            <p>{{ userMessage.object }}</p>
                        </div>
                        <div class="row">
                            <h5>Phone</h5>
                            <p>{{ userMessage.phone }}</p>
                        </div>
                        <div class="row">
                            <h5>Message</h5>
                            <p>{{ userMessage.message }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import adminService from "../../services/adminService";

export default {
    name: "Messages",
    data() {
        return {
            messages: [],
            isMessagesExist: true,
            userMessage: []
        }
    },
    created() {
        this.getMessages()
    },
    methods: {
        getUserMessage(message) {
            this.userMessage = []
            this.userMessage = message
        },
        getMessages() {
            adminService.getAllMessages().then(response => {
                this.messages = response.data
                if (this.messages.length < 1) {
                    this.isMessagesExist = false
                }
            })
                .catch(error => console.log(error))
                .finally()
        },
        deleteMessage(id) {
            adminService.deleteMessage({id:id}).then(response => {
                if (response.data.status === true) {
                    this.getMessages()
                }
            })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

p {
    color: #1b1e21;
}

h5 {
    color: #1b1e21;
}

li {
    background-color: #010302;
    color: #fa4251;
    border-bottom: 1px dotted #ffffff;
    cursor: pointer;
}

li:hover {
    color: #942c34;
    border-bottom: 1px dotted #942c34;
}

th {
    color: #fa4251;
}

.alert-warning {
    background-color: #fa4251;
    color: #ffffff;
    border: none;
}

.btn-warning {
    color: #ffffff;
    background-color: #424242;
    border: none;
}

</style>
