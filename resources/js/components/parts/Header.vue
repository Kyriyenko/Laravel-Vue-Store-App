<template>
    <div>
        <div class="container mt-1 mb-1">
            <header>
                <div class="row">
                    <div class="col header-title">
                        <p class="mb-0">DAYS A WEEK FROM 9:00 AM TO 7:00 PM</p>
                    </div>
                    <div class="col header-nav">
                        <nav class="nav">
                            <a class="nav-link" href="#">My Account</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Language
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark"
                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink1"
                                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Currency
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark"
                                    aria-labelledby="navbarDarkDropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <span v-if="role!=='guest'" v-on:click="logOutUser" class="logout-block">
                                   <i class="fas fa-sign-out-alt"></i>
                                </span>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
        <hr class="dropdown-divider">
        <div class="container mt-3">
            <div class="row look-row">
                <div class="col-md-4 center-block mt-2">
                    <div class="main-search mt_40 search-col">
                        <input id="search-input" name="search" value="" placeholder="Search"
                               class="form-control input-lg search-input" autocomplete="off" type="text">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 center-block mt-2">
                    <div class="center-block-text">
                        <div class="maine-text">DARK<span style="color:#fa4251">LOOK</span></div>
                        <div style="color: #5e5e5e">ONLINE SHOPPING STORE</div>
                    </div>
                </div>
                <div class="col-md-4 center-block mt-2">
                    <router-link to="/cart_page" class="p-2 link-secondary rout-link">
                        <i class="fas fa-shopping-cart"></i>
                        <div id="cart" class="btn-group btn-block mtb_40">
                            <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse"
                                    aria-expanded="true"><span id="shippingcart">Shopping cart</span></button>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
        <div class="container mt-5 container-navigation mb-5">
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <router-link to="/" class="p-2 link-secondary rout-link">home</router-link>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle categories-toggle" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            COLLECTION
                        </button>
                        <ul class="dropdown-menu categories" aria-labelledby="dropdownMenuButton1">
                            <div v-for="category in categories">
                                <div class="category-item" v-on:click="setCategory(category.id)">
                                    {{ category.title }}
                                </div>
                            </div>
                        </ul>
                    </div>
                    <router-link to="/shop" class="p-2 link-secondary rout-link">shop</router-link>
                    <router-link to="/aboutUs" class="p-2 link-secondary rout-link">About us</router-link>
                    <router-link to="/contactUs" class="p-2 link-secondary rout-link">Contact us</router-link>
                    <router-link v-if="role==='guest'" to="/login" class="p-2 link-secondary rout-link">
                        Login
                    </router-link>
                    <router-link v-if="role==='guest'" to="/registration" class="p-2 link-secondary rout-link">
                        Registration
                    </router-link>
                    <router-link v-if="role==='admin'" to="/adminPanel" class="p-2 link-secondary rout-link">Admin
                        Panel
                    </router-link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import authService from "../../services/authService"

export default {
    name: "Header",
    data() {
        return {
            role: 'guest',
            categories: []
        }
    },
    created() {
        this.getCategories()
        this.getUserStatus()
    },
    methods: {
        logOutUser() {
            authService.logOutUser().then(response => {
                if (response.data.status) {
                    window.location.replace('/');
                }
            })
        },
        getUserStatus() {
            authService.getUserStatus().then(response => {
                this.role = response.data.toString()
            })
        },
        getCategories() {
            axios
                .get('/getCategories')
                .then(response => {
                    this.categories = response.data
                })
                .catch(error => console.log(error))
                .finally()
        },
        setCategory(id) {
            sessionStorage.setItem('category', id);
            window.location.href = '/category'
        }
    }
}
</script>

<style scoped>
* {
    color: #ffffff;
}

.categories-toggle {
    border: none;
    background-color: #424242;
}

.categories {
    background-color: #424242;
}

.category-item {
    background-color: #424242;
    border-bottom: 1px dotted #010302;
    text-transform: uppercase;
    cursor: pointer;
    font-size: large;
    padding: 10px;
}

.category-item:hover {
    background-color: #333232;
    color: #c4bdbd;
}

.fa-sign-out-alt {
    font-size: xx-large;
}

.header-nav {
    display: flex;
    align-items: center;
    justify-content: center;
}

.look-row {
    justify-content: space-around;
}

.logout-block {
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container-navigation {
    background-color: #424242;
}

.nav-scroller {
    display: flex;
    justify-content: center;
}

.link-secondary {
    margin-right: 30px;
}

.header-title {
    display: flex;
    align-items: center;
    justify-content: center;
}

.center-block {
    display: flex;
    justify-content: center;
    align-items: center;
}

.row {
    display: flex;
    justify-content: center;
}

.form-control {
    width: 200px;
    background-color: #010302;
    color: white;
}

.center-block-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.rout-link {
    text-decoration: none;
    text-transform: uppercase;
}

.col {
    display: flex;
    justify-content: center;
}

.search-col {
    display: flex;

}

.search-input {
    height: 40px;
}

.maine-text {
    font-size: xxx-large;
    font-weight: 900;
}

.d-flex {
    align-items: center;
}

.fa-shopping-cart {
    font-size: x-large;
}


</style>
