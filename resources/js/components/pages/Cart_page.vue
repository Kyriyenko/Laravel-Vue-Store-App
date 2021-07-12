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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    <a href="#">
                                        <img
                                            src="https://cdn.pixabay.com/photo/2013/07/11/15/30/male-watch-144648_960_720.jpg"
                                            style="height: 80px"
                                            class="img-fluid img">
                                    </a>
                                </td>
                                <td class="text-left">Watches</td>
                                <td class="text-right">$254.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
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
                                <td class="text-right">$210.00</td>
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
export default {
    name: "Cart_page"
}
</script>

<style scoped>

.container {
    display: flex;
    justify-content: center;
}

.collapsed{
    text-decoration: none;
    color: #ffffff;
}



</style>
