<template>
    <div>
        <div class="footer pt_60">
            <div class="container-fluid container-footer-service p-5">
                <div class="container mt-5">
                    <div class="newsletters mt_30 mb_50">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="news-head pull-left">
                                    <h2 class="text-header">Follow Our Updates !</h2>
                                    <div class="new-desc">Be the First to know about our Fresh Arrivals and much more!
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="news-form pull-right">
                                    <form method="post">
                                        <div class="form-group required form-sub">
                                            <input name="email" id="email" placeholder="Enter Your Email"
                                                   class="form-control input-lg" required="" type="email">
                                            <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-3 footer-block">
                            <h6 class="footer-title ptb_20 text-header">Information</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 footer-block">
                            <h6 class="footer-title ptb_20 text-header">Services</h6>
                            <ul>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 footer-block">
                            <h6 class="footer-title ptb_20 text-header">Extras</h6>
                            <ul>
                                <li><a href="#">Brands</a></li>
                                <li><a href="#">Gift Certificates</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Newsletter</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 footer-block">
                            <h6 class="footer-title ptb_20 text-header">Contacts</h6>
                            <ul>
                                <li>Warehouse &amp; Offices,</li>
                                <li>12345 Street name, California USA</li>
                                <li>(+024) 666 888</li>
                                <li>yourid@domain.com</li>
                                <li><a href="#">www.yoursite.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt_60 ptb_20 mt-5">
                <div class="container">
                    <div class="row links-row">
                        <div class="col-sm-4">
                            <div class="social_icon">
                                <ul class="links-row">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fas fa-at"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="copyright-part text-center">@ 2019 All Rights Reserved Darklook</div>
                        </div>
                        <div class="col-sm-4">
                            <div class="payment-icon text-right">
                                <ul class="links-row">
                                    <li><a href="#"><i class="fab fa-cc-paypal"></i></a></li>
                                    <li><a href="#"><i class="fab fa-cc-visa"></i></a></li>
                                    <li><a href="#"><i class="fab fa-cc-discover"></i></a></li>
                                    <li><a href="#"><i class="fab fa-cc-mastercard"></i></a></li>
                                    <li><a href="#"><i class="fas fa-piggy-bank"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>


* {
    color: #919191;
}

.text-header {
    text-transform: uppercase;
    color: #ffffff;
}

.form-sub {
    display: flex;
    justify-content: center;
}

.links-row {
    display: flex;
    justify-content: space-around;
}

li {
    list-style-type: none;
}

.container-footer-service {
    background-color: #424242;
}

a {
    text-decoration: none;
}

.btn-default {
    background-color: #000000;
    color: #c8c8c8;
    text-transform: uppercase;
}


</style>
