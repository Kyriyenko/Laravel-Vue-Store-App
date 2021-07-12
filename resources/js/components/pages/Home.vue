<template>
<div>
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button  type="button"  data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active carousel-btn" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="carousel-btn" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img :src="require('/var/www/testprogs/sitestore.com/resources/images/main_banner1.jpg').default" class="img-fluid" alt="Logo">
                </div>
                <div class="carousel-item">
                    <img :src="require('/var/www/testprogs/sitestore.com/resources/images/main_banner2.jpg').default" class="img-fluid" alt="Logo">
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
            <v-fashion></v-fashion>
        </div>
        <div class="mt-5">
            <v-news></v-news>
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
*{
    color: white;
}

img{
    height: 600px;
    width: 100%;
}

.cms-icon{
    display: flex;
    justify-content: center;
    align-items: center;
}

i{
    margin-right: 10px;
    font-size: xx-large;
}

</style>
