<template>
  <main>
    <router-link to="/admin/brand/create" class="btn btn-primary">Add Brand</router-link>
    <div style="margin-bottom: 20px;"></div>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(brand, index) in brands" :key="index">
          <td>{{ brand.name }}</td>
          <td>
            <img :src="brand.image" class="img-fluid" style="max-width: 100px;">
          </td>
          <td>
            <router-link :to="{ path: '/admin/brands/' + brand.id + '/edit' }" class="btn btn-success mx-2">Edit</router-link>
            <button type="button" @click="deleteBrand(brand.id)" class="btn btn-danger mx-2">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
</template>

<script>
import axios from 'axios'

export default {
  name: 'brand',
  data() {
    return {
      brands: []
    };
  },
  mounted() {
    this.getBrand();
  },
  methods: {
    getBrand() {
      axios.get('http://127.0.0.1:8000/api/brands').then(res => {
        this.brands = res.data;
        // Log image URLs if needed
        console.log('Image URLs:', this.brands.map(brand => brand.image));
      });
    },

    deleteBrand(brandId) {
      if (confirm("Are you sure?")) {
        axios.delete(`http://127.0.0.1:8000/api/brands/${brandId}/delete`).then(res=>{
          this.getBrand();
        });
      }
    }
  }
}
</script>
