<template>
  <div class="card">
    <div class="card-body">
      <h1 class="card-title font-bold text-3xl text-center text-slate-600" style="font-family: 'Minerva-modern';">Create Type</h1>
      <form @submit.prevent="saveType">
        <div class="mb-3">
          <label for="typeName" class="form-label" style="font-family: 'Minerva-modern';">Type Name</label>
          <input type="text" class="form-control" id="typeName" v-model="model.name" required>
        </div>
        <div class="mb-3">
          <label for="typeImage" class="form-label" style="font-family: 'Minerva-modern';">Type Image</label>
          <input type="file" class="form-control" id="typeImage" @change="handleImageChange" accept="image/*" required>
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
  name: 'TypeCreate',
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
      console.log("Model before:", this.model.image);
      this.model.image = event.target.files[0];
      console.log("Model after:", this.model.image);
    },
    saveType() {
      let formData = new FormData();
      formData.append('name', this.model.name);
      formData.append('image', this.model.image);

      axios.post('http://127.0.0.1:8000/api/types', formData)
      .then(res => {
        console.log(res.data);
        this.model.name = '';
        this.model.image = null;
        this.$router.push('/admin/types')
      })
      .catch(error => {
        console.error('Error creating type:', error);
      });
    },
  }
}
</script>
