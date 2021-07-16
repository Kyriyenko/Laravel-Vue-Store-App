<template>
    <div>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            class="second-slide" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://html.lionode.com/darklook/images/blog/blog_img_04.jpg" class="d-block w-100"
                             alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="mb-3 ">POPULAR WATCHES FOR BEST MEN'S</h5>
                            <button type="button" class="btn btn-danger mb-5">SHOP NOW</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="http://html.lionode.com/darklook/images/blog/blog_img_04.jpg" class="d-block w-100"
                             alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="mb-3">DISCOUNT <span class="red-color">UPTO 90% OFF</span></h5>
                            <h3>BUY WATCHES</h3>
                            <button type="button" class="btn btn-danger mb-5">SHOP NOW</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="row">
                    <div class="col-sm-3 mt_20 cms-icon ">
                        <i style="color: #f4f0d3" class="fas fa-rocket"></i>
                        <div class="feature-i-left ptb_30 ">
                            <h6>Free Shipping</h6>
                            <p>Free dedlivery worldwide</p>
                        </div>
                    </div>
                    <div class="col-sm-3 mt_20 cms-icon ">
                        <i style="color:#26a6d1" class="fas fa-headphones"></i>
                        <div class="feature-i-left ptb_30 ">
                            <h6>Order Onlivne</h6>
                            <p>Hours : 8am - 11pm</p>
                        </div>
                    </div>
                    <div class="col-sm-3 mt_20 cms-icon ">
                        <i style="color:#c47e4d" class="fas fa-wallet"></i>
                        <div class="feature-i-left ptb_30 ">
                            <h6>Shop And Save</h6>
                            <p>For All Spices &amp; Herbs</p>
                        </div>
                    </div>
                    <div class="col-sm-3 mt_20 cms-icon ">
                        <i style="color: #3db39e" class="fas fa-shield-alt"></i>
                        <div class="feature-i-left ptb_30 ">
                            <h6>Safe Shoping</h6>
                            <p>Ensure genuine 100%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <v-featuredProducts></v-featuredProducts>
            </div>
            <div class="mt-5">
                <v-fashion></v-fashion>
            </div>
            <div class="mt-5">
                <v-news></v-news>
            </div>
            <div class="mt-5">
                <v-brand_logo></v-brand_logo>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>
* {
    color: white;
}

img {
    height: 600px;
    width: 100%;
}

.cms-icon {
    display: flex;
    justify-content: center;
    align-items: center;
}

i {
    margin-right: 10px;
    font-size: xx-large;
}

.carousel-indicators button {
    display: inline-block;
    width: 12px;
    height: 12px;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid #ffffff;
    background-color: #010302;
    text-align: center;
    outline: none;
    text-decoration: none;
}

.carousel-indicators .active {
    display: inline-block;
    width: 12px;
    height: 12px;
    cursor: pointer;
    border-radius: 50%;
    border: 3px solid #fb4250;
    background-color: #010302;
    text-align: center;
    outline: none;
    text-decoration: none;
}

.btn-danger {
    background-color: #fb4250;
    width: 240px;
}

h5 {
    font-size: xx-large;
}

h3{
    font-size: xxx-large;
    font-weight: bold;
}

.red-color{
    color: #fa4251;
}

</style>
