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
                            <div v-if="isLogin" class="alert alert-success mt-3" role="alert">
                                {{ serverMessage }}
                            </div>
                            <div v-if="isIncorrectData" class="mt-3">
                                <div class="alert alert-danger" role="alert">
                                    <ul v-for="error in errors">
                                        <li>{{ error.toString() }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div v-if="userDoesNotExist" class="mt-3">
                                <div class="alert alert-danger" role="alert">
                                    {{ serverMessage }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName1" class="mb-2">Name</label>
                            <input type="text" class="form-control" v-model="name" id="exampleInputName1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="mb-2">Password</label>
                            <input type="password" class="form-control" v-model="password" id="exampleInputPassword1">
                        </div>
                        <button v-on:click="loginUser" type="button" class="btn">LOG IN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import authService from "../../services/authService"

export default {
    name: "Login",
    data() {
        return {
            name: '',
            password: '',
            userDoesNotExist: false,
            isLogin: false,
            serverMessage: '',
            errors: {},
            isIncorrectData: false,
            isLoginFormError: false
        }
    },
    methods: {
        loginUser() {
            this.userDoesNotExist = false
            this.isIncorrectData = false
            this.isLoginFormError = false
            authService.login({name: this.name, password: this.password}).then(response => {
                let isSuccessLogin = response.data.status
                if (isSuccessLogin === 'login') {
                    this.isLogin = true
                    this.serverMessage = response.data.message
                    setTimeout(() => {
                        window.location.replace('/');
                    }, 1000);
                }
                if (isSuccessLogin === 'braked') {
                    this.isIncorrectData = true
                    this.errors = response.data.errors
                }
                if (isSuccessLogin === 'null') {
                    this.userDoesNotExist = true
                    this.serverMessage = response.data.message
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
    align-items: center;
    flex-direction: column;
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
