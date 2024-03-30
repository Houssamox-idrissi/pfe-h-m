<template>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <h1 class="mb-4 text-slate-600">Create Vision Need</h1>
              <form @submit.prevent="saveVisionNeed">
                <div class="mb-3">
                  <label for="visionNeedName" class="form-label">Vision Need Name</label>
                  <input type="text" class="form-control" id="visionNeedName" v-model="model.name" required>
                </div>
                <div class="mb-3">
                  <label for="visionNeedDescription" class="form-label">Vision Need Description</label>
                  <input type="text" class="form-control" id="visionNeedDescription" v-model="model.description" required>
                </div>
                <div class="mb-3">
                  <label for="visionNeedImage" class="form-label">Vision Need Image</label>
                  <input type="file" class="form-control" id="visionNeedImage" @change="handleImageChange" accept="image/*" required>
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
          image: null
        }
      }
    },
    methods: {
      handleImageChange(event) {
        this.model.image = event.target.files[0];
      },
      saveVisionNeed() {
        let formData = new FormData();
        formData.append('name', this.model.name);
        formData.append('description', this.model.description);
        formData.append('image', this.model.image);
  
        axios.post('http://127.0.0.1:8000/api/vision-create', formData, {})
        .then(res => {
          console.log(res.data);
          this.model.name = '';
          this.model.description = '';
          this.model.image = null;
          this.$router.push('/admin/visionNeed')
        })
        .catch(error => {
          console.error('Error creating vision need:', error);
        });
      },
    }
  }
  </script>
  