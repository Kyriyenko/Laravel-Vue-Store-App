<template>
<div>
   <div class="container mb-5">
       <div class="latest-news mb-3">
           <h2>LATEST NEWS</h2>
       </div>
       <div  class="row">
               <div  v-for="card in news" class="col-md-6" >
                   <div>
                       <div class="card">
                           <img src="https://cdn.pixabay.com/photo/2014/07/31/23/00/wristwatch-407096_960_720.jpg" class="card-img-top" alt="...">
                           <div class="card-body">
                               <h2 class="card-text">{{card.title}}</h2>
                               <p class="card-text">{{card.description}}</p>
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
    name: "News",
    data(){
      return{
        news:[],
      }
    },
    created() {
        this.getNews()
    },
    methods:{
        getNews(){
            axios
                .get('/news')
                .then(response => {
                    this.news=response.data
                })
                .catch(error => console.log(error))
                .finally()
        }
    }
}
</script>

<style scoped>

p{
    color: #6c6c6c;
    font-family:sans-serif;
}

.card{
    background-color: black;
    padding: 15px;
}

.latest-news{
    border-bottom: 2px solid #424242;
}

</style>
