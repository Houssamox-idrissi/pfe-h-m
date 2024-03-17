<template>
    <main>
      <router-link to="/admin/glasses/create" class="btn btn-primary">Add Glasses</router-link>
      <div style="margin-bottom: 20px;"></div>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Model</th>
            <th>Price</th>
            <th>Size</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Type</th>
            <th>Image</th>  
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(glasses, index) in glassesList" :key="index">
            <td>{{ glasses.Model }}</td>
            <td>{{ glasses.Price }}</td>
            <td>{{ glasses.size }}</td>
            <td>{{ glasses.brand.name }}</td>
            <td>{{ glasses.category.name }}</td>
            <td>{{ glasses.type.name }}</td>
            <td>
              <img :src="'http://127.0.0.1:8000/'+glasses.image" alt="Glasses Image" class="img-fluid" style="max-width: 100px;">
            </td>
            <td>
              <router-link :to="{ path: '/glasses/' + glasses.id + '/edit' }" class="btn btn-success mx-2">Edit</router-link>
              <button type="button" @click="deleteGlasses(glasses.id)" class="btn btn-danger mx-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </template>
  
  <script>
  import axios from 'axios'
  import { RouterLink } from 'vue-router';
  
  export default {
    name: 'glasses',
    data() {
      return {
        glassesList: []
      };
    },
    mounted() {
      this.getGlasses();
    },
    methods: {
      getGlasses() {
        axios.get('http://127.0.0.1:8000/api/glasses').then(res => {
          this.glassesList = res.data;
        });
      },
  
      deleteGlasses(glassesId) {
        if (confirm("Are you sure?")) {
          axios.delete(`http://127.0.0.1:8000/api/glasses/${glassesId}/delete`).then(res=>{
            console.log("hello");
            this.getGlasses();
          });
        }
      }
    },
    components: { RouterLink }
  }
  </script>
  