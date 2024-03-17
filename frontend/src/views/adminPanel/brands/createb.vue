<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <h1 class="mb-4">Create Brand</h1>
          <form @submit.prevent="saveBrand">
            <div class="mb-3">
              <label for="brandName" class="form-label">Brand Name</label>
              <input type="text" class="form-control" id="brandName" v-model="model.name" required>
            </div>
            <div class="mb-3">
              <label for="brandImage" class="form-label">Category Image</label>
              <input type="file" class="form-control" id="brandImage" @change="handleImageChange" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'BrandCreate',
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
      saveBrand() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/brands', formData, {
        })
        .then(res => {
          console.log(res.data);
          this.model.name = '';
          this.model.image = null;
        })
        .catch(error => {
          console.error('Error creating Brand:', error);
        });
      },
    }
  }
  </script>
  