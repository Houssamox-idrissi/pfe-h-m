<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h1>Update Category</h1>
        <form @submit.prevent="UpdateCategory">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" v-model="model.name" required>
          </div>
          <div class="mb-3">
            <label for="categoryImage" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="categoryImage" @change="handleImageChange" accept="image/*" required>
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
  name: 'CategoryUpdate',
  data() {
    return {
      CategoryId: '',
      model: {
        name: '',
        image: null,
      }
    }
  },
  mounted() {
    this.CategoryId = this.$route.params.id;
    this.getCategoryData(this.CategoryId);
  },
  methods: {
    getCategoryData(CategoryId) {
      axios.get(`http://127.0.0.1:8000/api/categories/${CategoryId}/edit`)
        .then(res => {
          this.model.name = res.data.name;
        })
        .catch(error => {
          console.error('Error fetching category data:', error);
        });
    },
    handleImageChange(event) {
      this.model.image = event.target.files[0];
    },
    UpdateCategory() {
      let formData = new FormData();
      formData.append('name', this.model.name);
      formData.append('image', this.model.image);
      axios.put(`http://127.0.0.1:8000/api/categories/${this.CategoryId}/update`, formData)
        .then(res => {
          console.log('Category updated successfully:', res.data);
        })
        .catch(error => {
          console.error('Error updating category:', error);
        });
    },
  }
}
</script>
