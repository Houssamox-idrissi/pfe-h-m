<template>
  <main>
    <router-link to="/admin/category/create" class="btn btn-primary">Add Category</router-link>
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
        <tr v-for="(category, index) in categories" :key="index">
          <td>{{ category.name }}</td>
          <td>
            <img :src="'http://127.0.0.1:8000/storage'+category.image.replace('public','')" alt="nothing!" class="img-fluid" style="max-width: 100px;">
          </td>
          <td>
            <RouterLink :to="{ path: '/categories/' + category.id + '/edit' }" class="btn btn-success mx-2">Edit
            </RouterLink>
            <button type="submit" @click="deleteCat(category.id)" class="btn btn-success  mx-2">Delete</button>
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
  name: 'categories',
  data() {
    return {
      categories: []
    };
  },
  mounted() {
    this.getCategory();
  },
  methods: {
    getCategory() {
      axios.get('http://127.0.0.1:8000/api/categories').then(res => {
        this.categories = res.data;
      });
    },

    deleteCat(categoryId) {
      if (confirm("Are you sure?")) {
        axios.delete(`http://127.0.0.1:8000/api/categories/${categoryId}/delete`).then(res=>{
          this.getCategory();
        });
      }
    }
  },
  components: { RouterLink }
}
</script>
  
  
  