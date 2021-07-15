<template>
    <div>
        <div class="container">
            <div class="col-sm-8 col-lg-9 mtb_20">
                <form enctype="multipart/form-data" method="post" action="#">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-right">Total</td>
                                <td class="text-right"></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="product in products">
                                <td class="text-center">
                                    <a href="#">
                                        <img
                                            src="https://cdn.pixabay.com/photo/2013/07/11/15/30/male-watch-144648_960_720.jpg"
                                            style="height: 70px"
                                            class="img-fluid img">
                                    </a>
                                </td>
                                <td class="text-left">{{ product.product_title }}</td>
                                <td class="text-right">{{ product.price }}$</td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-danger"
                                            v-on:click="deleteProduct(product.orders_id,product.product_id)">DELETE
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div v-if="transactionStatus">
                    <div class="alert alert-success" role="alert">
                        Transaction was successful
                    </div>
                </div>
                <h3 class="mtb_10">What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
                <div class="panel-group mt_20" id="accordion">
                    <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"
                                   data-parent="#accordion"
                                   href="#collapseOne" aria-expanded="false"
                                   class="collapsed">
                                    Use Coupon Code <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                             style="height: 0px;">
                            <div class="panel-body">
                                <label for="input-coupon" class="col-sm-4 control-label">Enter your coupon here</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="input-coupon"
                                           placeholder="Enter your coupon here" value="" name="coupon">
                                    <span class="input-group-btn">
                                         <input type="button" class="btn" data-loading-text="Loading..."
                                                id="button-coupon" value="Apply Coupon">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default pull-left">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"
                                   aria-expanded="false">Use
                                    Gift Voucher
                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                             style="height: 0px;">
                            <div class="panel-body">
                                <label for="input-voucher" class="col-sm-4 control-label">Enter your gift voucher code
                                    here
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="input-voucher"
                                           placeholder="Enter your gift voucher code here" value="" name="voucher">
                                    <span class="input-group-btn">
                                         <input type="button" class="btn" data-loading-text="Loading..."
                                                id="button-voucher" value="Apply Voucher">
                                     </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right">{{ totalPrice }}$</td>
                                <td>
                                    <button type="button" class="btn btn-warning" v-on:click="makePayment">Confirm
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import transactionService from "../../services/transactionService";

export default {
    name: "Cart_page",
    data() {
        return {
            products: [],
            totalPrice: '',
            transactionStatus: false,
            orderId: ''
        }
    },
    created() {
        this.getOrderId()
        this.getProducts()
    },
    methods: {
        getOrderId() {
            transactionService.getOrderId().then(response => {
                this.orderId = response.data.orderId
            })
                .catch(error => console.log(error))
                .finally()
        },
        getProducts() {
            transactionService.getProducts().then(response => {
                if (response.data.status === false) {
                    return;
                }
                if (response.data.status === true) {
                    this.products = response.data.orderProducts
                    this.totalPrice = response.data.totalPrice
                }
            })
                .catch(error => console.log(error))
                .finally()
        },
        deleteProduct(orderId, productId) {
            transactionService.deleteProduct({orderId: orderId, productId: productId}).then(response => {
                if (response.data.status === true) {
                    this.getProducts()
                }
            })
                .catch(error => console.log(error))
                .finally()
        },
        makePayment() {
            transactionService.makePayment({orderId: this.orderId}).then(response => {
                if (response.data.status === true) {
                    this.products = []
                    this.transactionStatus = true
                    this.totalPrice=''
                }
            })
                .catch(error => console.log(error))
                .finally()
        }
    }

}
</script>

<style scoped>

.container {
    display: flex;
    justify-content: center;
}

.collapsed {
    text-decoration: none;
    color: #ffffff;
}
</style>
