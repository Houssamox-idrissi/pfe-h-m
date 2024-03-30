<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <h1 class="mb-4 text-slate-600">Create Lens Thickness</h1>
              <form @submit.prevent="saveLensThickness">
                <div class="mb-3">
                  <label for="lensThicknessName" class="form-label">Lens Thickness Name</label>
                  <input type="text" class="form-control" id="lensThicknessName" v-model="model.name" required>
                </div>
                <div class="mb-3">
                  <label for="lensThicknessDescription" class="form-label">Lens Thickness Description</label>
                  <input type="text" class="form-control" id="lensThicknessDescription" v-model="model.description" required>
                </div>
                <div class="mb-3">
                  <label for="lensThicknessPrice" class="form-label">Lens Thickness Price</label>
                  <input type="text" class="form-control" id="lensThicknessPrice" v-model="model.price" required>
                </div>
                <div class="mb-3">
                  <label for="lensThicknessImage" class="form-label">Lens Thickness Image</label>
                  <input type="file" class="form-control" id="lensThicknessImage" @change="handleImageChange" accept="image/*" required>
                </div>
                <button type="submit" class="bg-black px-4 py-2 rounded-full text-white">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        model: {
          name: '',
          description: '',
          price: '',
          image: null
        }
      };
    },
    methods: {
      handleImageChange(event) {
        this.model.image = event.target.files[0];
      },
      saveLensThickness() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('description', this.model.description);
        formData.append('price', this.model.price);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/lens-thicknesses', formData, {})
          .then(res => {
            console.log(res.data);
            this.model.name = '';
            this.model.description = '';
            this.model.price = '';
            this.model.image = null;
            this.$router.push('/admin/lensThickness');
          })
          .catch(error => {
            console.error('Error creating lens thickness:', error);
          });
      },
    }
  };
  </script>
  