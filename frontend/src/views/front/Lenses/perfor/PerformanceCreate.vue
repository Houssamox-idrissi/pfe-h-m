<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <h1 class="mb-4 text-slate-600">Create Lens Performance</h1>
              <form @submit.prevent="saveLensPerformance">
                <div class="mb-3">
                  <label for="lensPerformanceName" class="form-label">Lens Performance Name</label>
                  <input type="text" class="form-control" id="lensPerformanceName" v-model="model.name" required>
                </div>
                <div class="mb-3">
                  <label for="lensPerformanceDescription" class="form-label">Lens Performance Description</label>
                  <input type="text" class="form-control" id="lensPerformanceDescription" v-model="model.description" required>
                </div>
                <div class="mb-3">
                  <label for="lensPerformancePrice" class="form-label">Lens Performance Price</label>
                  <input type="text" class="form-control" id="lensPerformancePrice" v-model="model.price" required>
                </div>
                <div class="mb-3">
                  <label for="lensPerformanceImage" class="form-label">Lens Performance Image</label>
                  <input type="file" class="form-control" id="lensPerformanceImage" @change="handleImageChange" accept="image/*" required>
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
      saveLensPerformance() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('description', this.model.description);
        formData.append('price', this.model.price);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/lens-performances', formData, {})
          .then(res => {
            console.log(res.data);
            this.model.name = '';
            this.model.description = '';
            this.model.price = '';
            this.model.image = null;
            this.$router.push('/admin/LensPerformance');
          })
          .catch(error => {
            console.error('Error creating lens performance:', error);
          });
      },
    }
  };
  </script>
  