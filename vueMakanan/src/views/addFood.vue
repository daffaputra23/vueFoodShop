<template>
  <div class="container">
    <Navbar />

    <div class="" style="padding-top:40px;">
        <H1 style="text-align: center; margin-bottom: 40px;">FORM TAMBAH MAKANAN</H1>
        <form @submit.prevent="saveproduct" enctype="multipart/form-data">
            <div class="mb-10" style="margin-bottom:30px;">
                <label for="kodeMakanan" class="form-la">Kode Makanan</label>
                <input type="number" class="form-control" id="kodeMakanan" placeholder="example : 2303" v-model="products.kode">
            </div>
            <div class="mb-3" style="margin-bottom:30px;">
                <label for="namaMakanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="namaMakanan" v-model="products.nama">
            </div>
            <div class="mb-3" style="margin-bottom:30px;">
                <label for="namaMakanan" class="form-label">Harga</label>
                <input type="text" class="form-control" id="namaMakanan" v-model="products.harga">
            </div>
            <!-- <div style="margin-bottom:30px;">
                <label for="select">Status Makanan</label>
                <select id="select" class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:100%; padding: 10px; border-color: #eaeaea; border-radius: 4px;" v-model="products.is_ready">
                    <option value="true">Tersedia</option>
                    <option value="false">Tidak Tersedia</option>
                </select>
            </div> -->
            
              
                <input class="form-control" type="file" id="formFile" style="padding:50px;" @change="imgupload" name="image" >
            
            <div class="form-group" style="margin-bottom:60px;">    
                <div  class="gambar">
                    <p style="font-weight: 700; style">Preview Gambar Disini..</p>
                    <img :src="preview" alt="" width="200" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import axios from "axios";

export default {
    name : "addFood",
    components : {
        Navbar
    },
    data(){
        return{
            products :{},
            image: "",
            preview: "",
        }
    },
    methods: {
    imgupload(e) {
      this.image = e.target.files[0];
      console.log(this.image);

      console.log(this.products.nama);
      console.log(this.products.harga);
      console.log(this.products.is_ready);

      let fileReader = new FileReader();
      fileReader.readAsDataURL(this.image);
      fileReader.onload = (e) => {
        this.preview = e.target.result;
        console.log(this.preview);
      };
    },
    async saveproduct() {
      let formData = new FormData();
      formData.append("kode", this.products.kode);
      formData.append("nama", this.products.nama);
      formData.append("harga", this.products.harga);
      formData.append("is_ready", this.products.is_ready);
      formData.append("image", this.image);

      console.log(formData);

      let url = "http://127.0.0.1:8000/api/addProduct";
      await axios
        .post(url, formData)
        .then((response) => {
          if (response.data.success == true) {
            alert(response.data.message);
            this.products.kode = "";
            this.products.nama = "";
            this.products.harga = "";
            this.products.is_ready = "";
            this.image = "";
            this.preview = "";
            this.$router.push({ name: "dataFood" });
          }
        })
        .catch((error) => {
          console.log(error.response);
        });
    },
  },

}
</script>

<style>

</style>