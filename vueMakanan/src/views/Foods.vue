<template>
  <div>
    <Navbar />
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <h2>
            Daftar
            <strong>Makanan</strong>
          </h2>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col">
          <div class="input-group mb-3">
            
            <input
              v-model="search"
              type="text"
              class="form-control"
              placeholder="Cari Makanan Kesukaan Anda .."
              aria-label="Cari"
              aria-describedby="basic-addon1"
              @keyup="searchFood"
            />

            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <b-icon-search></b-icon-search>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md-4 mt-4" v-for="items in food" :key="items.id">
           <div class="card shadow card-product">
                <img :src=" 'assets/images/' +items.gambar " class="card-img-top" alt="..." />
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
// import CardProduct from "@/components/CardProduct.vue";
import axios from "axios";

export default {
  name: "Foods",
  components: {
    Navbar,
    // CardProduct, 
  },
  data() {
    return {
      food : Array,
      search: '',
    };
  },

  created() {
    this.getProduct();
  },
  mounted() {
    console.log("Product List Created");
  },
  // computed: {
  //           filteredJobs: function() {
  //               return this.food.filter((foo) => {
  //                   return food.nama.match(this.search);
  //               })
  //           }
  //       },
  methods: {
    setProducts(data) {
      this.food = data;
    },
    searchFood() {
      axios
      .get(`http://localhost:8000/api/search?q=${this.search}`)
      .then((response) => this.setProducts(response.data))
      .catch((error) => console.log(error));
    },

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
}
</script>
<style>
</style>