<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1>Update Brand</h1>
        <form @submit.prevent="updateBrand">
          <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brandName" v-model="model.name" required>
          </div>
          <div class="mb-3">
            <label for="brandImage" class="form-label">Brand Image</label>
            <input type="file" class="form-control" id="brandImage" @change="handleImageChange" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'BrandEdit',
  data() {
    return {
      BrandId: '',
      model: {
        name: '',
        image: null,
      }
    }
  },
  mounted() {
    this.BrandId = this.$route.params.id;
    this.getBrandData(this.BrandId);
  },
  methods: {
    getBrandData(BrandId) {
      axios.get(`http://127.0.0.1:8000/api/brands/${BrandId}/edit`)
        .then(res => {
          this.model.name = res.data.name;
          
          // Optionally, set image if it's stored in the backend and needs to be displayed
        })
        .catch(error => {
          console.error('Error fetching brand data:', error);
        });
    },
    handleImageChange(event) {
      this.model.image = event.target.files[0];
    },
    updateBrand() {
      let formData = new FormData();
      formData.append('name', this.model.name);
      if (this.model.image) {
        formData.append('image', this.model.image);
      }

      if (!this.BrandId) {
        console.error('BrandId is empty. Unable to update brand.');
        return;
      }

      axios.put(`http://127.0.0.1:8000/api/brands/${this.BrandId}/update`, formData)
        .then(res => {
          console.log('Brand updated successfully:', res.data);
          // Optionally, perform any additional actions upon successful update
        })
        .catch(error => {
          console.error('Error updating brand:', error);
        });
    },
  }
}
</script>
