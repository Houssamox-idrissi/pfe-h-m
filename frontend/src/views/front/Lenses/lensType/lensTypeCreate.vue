<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <h1 class="mb-4 text-slate-600">Create Lens Type</h1>
              <form @submit.prevent="saveLensType">
                <div class="mb-3">
                  <label for="lensTypeName" class="form-label">Lens Type Name</label>
                  <input type="text" class="form-control" id="lensTypeName" v-model="model.name" required>
                </div>
                <div class="mb-3">
                  <label for="lensTypeDescription" class="form-label">Lens Type Description</label>
                  <input type="text" class="form-control" id="lensTypeDescription" v-model="model.description" required>
                </div>
                <div class="mb-3">
                  <label for="lensTypePrice" class="form-label">Lens Type Price</label>
                  <input type="text" class="form-control" id="lensTypePrice" v-model="model.price" required>
                </div>
                <div class="mb-3">
                  <label for="lensTypeImage" class="form-label">Lens Type Image</label>
                  <input type="file" class="form-control" id="lensTypeImage" @change="handleImageChange" accept="image/*" required>
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
      saveLensType() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('description', this.model.description);
        formData.append('price', this.model.price);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/lens-types', formData, {})
          .then(res => {
            console.log(res.data);
            this.model.name = '';
            this.model.description = '';
            this.model.price = '';
            this.model.image = null;
            this.$router.push('/admin/lensType');
          })
          .catch(error => {
            console.error('Error creating lens type:', error);
          });
      },
    }
  };
  </script>
  