<template>
  <div>
    <h1>Create Type</h1>
    <form @submit.prevent="saveType">
      <div class="mb-3">
        <label for="typeName" class="form-label">Type Name</label>
        <input type="text" class="form-control" id="typeName" v-model="model.name" required>
      </div>
      <div class="mb-3">
        <label for="typeImage" class="form-label">Type Image</label>
        <input type="file" class="form-control" id="typeImage" @change="handleImageChange" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

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
