<template>
    <div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-3">
                    <v-banner></v-banner>
                </div>
                <div class="col-md-9 login-box">
                    <form>
                        <div>
                            <div v-if="isRegistrationSuccess" class="alert alert-success mt-2" role="alert">
                                {{ serverMessage }}
                            </div>
                            <div v-if="isIncorrectData" class="mt-3">
                                <div class="alert alert-danger" role="alert">
                                    <ul v-for="error in errors">
                                        <li>{{ error.toString() }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div v-if="!uniqueUser" class="mt-2">
                                <div class="alert alert-danger" role="alert">
                                    {{ serverMessage }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName1" class="mb-2">Your name</label>
                            <input type="text" v-model="name" class="form-control" id="exampleInputName1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="mb-2">Email address</label>
                            <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="mb-2">Password</label>
                            <input type="password" v-model="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="button" v-on:click="createUser" class="btn">REGISTER NOW</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import authService from "../../services/authService"

export default {
    name: "Registration",
    data() {
        return {
            name: '',
            email: '',
            password: '',
            isRegistrationSuccess: false,
            serverMessage: '',
            errors: {},
            isIncorrectData: false,
            uniqueUser: true,
            isRulesAccepted: false,
            isRegistrationFormError: false
        }
    },

    methods: {
        createUser() {
            this.uniqueUser = true
            this.isIncorrectData = false
            this.isRegistrationSuccess = false
            this.isRegistrationFormError = false
            authService.registration({name: this.name, email: this.email, password: this.password}).then(response => {
                let isQuerySuccess = response.data.status
                if (response.data.unique === false) {
                    this.uniqueUser = false
                    this.serverMessage = response.data.message.toString()
                    return;
                }
                if (isQuerySuccess) {
                    this.isRegistrationSuccess = response.data.status
                    this.serverMessage = response.data.message.toString()
                    if (this.isRegistrationSuccess) {
                        setTimeout(() => {
                            window.location.replace('/');
                        }, 1000);
                    }
                } else {
                    this.errors = response.data.errors
                    this.isIncorrectData = true
                }
            })
        }
    }
}
</script>

<style scoped>

* {
    color: #9e9e9e;
}

.login-box {
    display: flex;
    justify-content: center;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    padding: 20px;
}

.btn {
    background-color: #424242;
}

.alert-danger {
    background-color: #fa4251;
    color: #ffffff;
}

li {
    color: #ffff;
}

.alert-success {
    background-color: #59be59;
    color: #ffffff;
}

</style>
