<template>
    <div>
      <h1>Create Category</h1>
      <form @submit.prevent="saveCategory">
        <div class="mb-3">
          <label for="categoryName" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="categoryName" v-model="model.name" required>
        </div>
        <div class="mb-3">
          <label for="categoryImage" class="form-label">Category Image</label>
          <input type="file" class="form-control" id="categoryImage" @change="handleImageChange" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </template>
    
  <script>
  import axios from 'axios';
  
  export default {
    name: 'CategoryCreate',
    data() {
      return {
        model: {
          name: '',
          image: null,
        }
      }
    },
    methods: {
      handleImageChange(event) {
        this.model.image = event.target.files[0];
      },
      saveCategory() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/categories', formData, {
        })
        .then(res => {
          console.log(res.data);
          this.model.name = '';
          this.model.image = null;
        })
        .catch(error => {
          console.error('Error creating category:', error);
        });
      },
    }
  }
  </script>
  