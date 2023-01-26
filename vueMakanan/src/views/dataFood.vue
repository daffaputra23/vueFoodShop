<template>
      <!-- <Navbar /> -->
      <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="items in food" :key="items.id">
      <th scope="row">{{items.nama}}</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
      </div>
    
</template>

<script>
// import Navbar from "@/components/Navbar.vue";
import axios from "axios";

export default{
    name : 'dataFood',
    components : {
        // Navbar   
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
    
}
</script>