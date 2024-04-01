<template>
  <div class="card">
    <div class="card-body">
      <h1 class="card-title font-bold text-3xl text-center text-slate-600" style="font-family: 'Minerva-modern';">Create Brand</h1>
      <form @submit.prevent="saveBrand">
        <div class="mb-3">
          <label for="brandName" class="form-label" style="font-family: 'Minerva-modern';">Brand Name</label>
          <input type="text" class="form-control" id="brandName" v-model="model.name" required>
        </div>
        <div class="mb-3">
          <label for="brandImage" class="form-label" style="font-family: 'Minerva-modern';">Brand Image</label>
          <input type="file" class="form-control" id="brandImage" @change="handleImageChange" accept="image/*" required>
        </div>
        <button type="submit" class="bg-black px-4 py-2 rounded-full text-white">Submit</button>
      </form>
    </div>
  </div>
</template>

<style>
.card {
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 20px auto;
  max-width: 500px;
  padding: 20px;
}

.card-title {
  margin-bottom: 20px;
}


</style>

  
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
          this.$router.push('/admin/brands');
        })
        .catch(error => {
          console.error('Error creating Brand:', error);
        });
      },
    }
  }
  </script>
  