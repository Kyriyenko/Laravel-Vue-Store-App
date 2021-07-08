<template>
<div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-3">
                <v-banner></v-banner>
            </div>
            <div class="col-md-9 contact-content">
                    <div class="row">
                        <div v-if="isServerErrors" class="alert alert-danger" role="alert">
                            <ul v-for="error in serverErrors">
                                <li>{{error.toString()}}</li>
                            </ul>
                        </div>
                        <div v-if="status" class="alert alert-success" role="alert">
                            {{serverMessage}}
                        </div>
                        <div class="col-md-4 col-xs-12 contact">
                            <div class="location mt-5">
                                <h5 class="capitalize mb_20"><strong>Our Location</strong></h5>
                                <div class="address">Office address
                                    <br> 124,Lorem Ipsum has been
                                    <br> text ever since the 1500</div>
                                <div class="call mt_10 mt-3"><i class="fa fa-phone" aria-hidden="true"></i>+91-9987-654-321</div>
                            </div>
                            <div class="Career mt-5">
                                <h5 class="capitalize mb_20"><strong>Careers</strong></h5>
                                <div class="address">dummy text ever since the 1500s, simply dummy text of the typesetting industry. </div>
                                <div class="email mt_10 mt-3"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">careers@yourdomain.com</a></div>
                            </div>
                            <div class="Hello mt-5">
                                <h5 class="capitalize mb_20"><strong>Say Hello</strong></h5>
                                <div class="address">simply dummy text of the printing and typesetting industry.</div>
                                <div class="email mt_10 mt-3"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12 contact-form mb_50">
                            <div id="contact_form">
                                <form id="contact_body">
                                    <div class="mt-4">
                                        <input class="full-with-form" v-model="name" type="text" name="name" placeholder="Name" data-required="true">
                                    </div>
                                    <div class="mt-4">
                                        <input class="full-with-form  mt_30" v-model="email" type="email" name="email" placeholder="Email Address" data-required="true">
                                    </div>
                                    <div class="mt-4">
                                        <input class="full-with-form  mt_30"  v-model="phone" type="text" name="phone1" placeholder="Phone Number" maxlength="15" data-required="true">
                                    </div>
                                    <div class="mt-4">
                                        <input class="full-with-form  mt_30" v-model="subject" type="text" name="subject" placeholder="Subject" data-required="true">
                                    </div>
                                    <div class="mt-4">
                                        <textarea class="full-with-form  mt_30" v-model="message"  name="message" placeholder="Message" data-required="true"></textarea>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn mt_30 send-btn" v-on:click="sendComment" type="button">Send Message</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 map mb_80 mt-5">
                            <img draggable="true" alt="" role="presentation" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i16!2i46039!3i28810!4i256!2m3!1e0!2sm!3i562287792!2m3!1e2!6m1!3e5!3m17!2sru-RU!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAT3mI0RI16q19Oxv93gSxN0cF0wfxWN6w&amp;token=65818" style="width: 100%; height: 500px;  border: 0px; padding: 0px; margin: 0px; max-width: none;">
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
    name: "Contactus",
    data() {
        return {
           name:'',
           email:'',
           phone:'',
           subject:'',
           message:'',
           status:'',
           isServerErrors:false,
           serverErrors:[],
           serverMessage:'',
        }
    },
    methods:{
        sendComment(){
            this.isServerErrors=false
            this.status=false
            axios
                .post('/reviews/send', {name:this.name,email:this.email,phone:this.phone,subject:this.subject,message:this.message})
                .then(response => {
                    this.status=response.data.status
                    if(this.status===false){
                        this.isServerErrors=true
                        this.serverErrors=response.data.errors
                    }
                    else {
                        this.serverMessage=response.data.message
                        this.name=''
                        this.email=''
                        this.phone=''
                        this.subject=''
                        this.message=''
                    }
                })
                .catch(error => console.log(error))
                .finally()
        },
    },
}
</script>

<style scoped>

a{
    text-decoration: none;
}

*{
    color: #9e9e9e;
}

.send-btn{
    background-color: #424242;
    color: #ffffff;
}

input{
    height: 50px;
    width: 100%;
}

textarea{
    height: 120px;
    width: 100%;
}

.contact-content{
    display: flex;
    justify-content: space-between;
}

.alert-danger{
    background-color: #fa4251;
}

li{
    color: #ffff;
}

.alert-success{
    color: #59be59;
}
</style>
