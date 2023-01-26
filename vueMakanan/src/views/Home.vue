<template>
  <div class="home">
    <Navbar />
    <div class="container">
      <Hero />

      <div class="row mt-4">
        <div class="col">
          <h2>
            Best
            <strong>Foods</strong>
          </h2>
        </div>
        <div class="col">
          <router-link to="/foods" class="btn btn-success float-right">
            <b-icon-eye></b-icon-eye>Lihat Semua
          </router-link>
        </div>
      </div>
   <div class="row mb-4">
        <div class="col-md-4 mt-4" v-for="items in food" :key="items.id">
           <div class="card shadow card-product">
                <img :src=" 'assets/images/' +items.image " class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">{{ items.nama }}</h5>
                    <p
                      class="card-text"
                    >Harga : Rp. {{ items.harga }}</p>
                    <router-link class="btn btn-success" :to="'/foods/'+items.id"><b-icon-cart></b-icon-cart> Pesan</router-link>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Navbar from "@/components/Navbar.vue";
import Hero from "@/components/Hero.vue";
// import CardProduct from "@/components/CardProduct.vue";
import axios from "axios";

export default {
//   components: {
//     Navbar,
//     Hero,
//     // CardProduct,
//   },
  
// data(){
//   return{
//     food: {}
//   };
// },

// methods :{
//   loadData(){
//     axios.get('http://127.0.0.1:8000/api/crud').then(({data}) => (this.food = data));
//   }, 
// },

// created(){
//   this.loadData();
// }
  name: "Home",
  components: {
    Navbar,
    Hero,
    // CardProduct,
  },
  data() {
    return {
      food: Array,
    };
  },
  created() {
    this.getProduct();
  },
  mounted() {
    console.log("Product List Created");
  },
  methods: {
    async getProduct() {
      let url = "http://127.0.0.1:8000/api/crud";
      await axios
        .get(url)
        .then((response) => {
          this.food = response.data.data;
          console.log(this.products);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  }
  // data() {
  //   return {
  //     food: Array,
  //   };
  // },
  // methods: {
  //   setProducts(data) {
  //     this.food = data;
  //   },
  // },
  // created() {
  //   axios
  //     .get("http://127.0.0.1:8000/api/crud")
  //     .then((response) => this.setProducts(response.data))
  //     .catch((error) => console.log(error))
  // },

   
};
</script>
