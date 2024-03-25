<template>
  <div class="container">
    <div class="row">
      <div class="mx-auto col-md-6">
        <h1>Update Type</h1>
        <form @submit.prevent="updateType">
          <div class="mb-3">
            <label for="typeName" class="form-label">Type Name</label>
            <input type="text" class="form-control" id="typeName" v-model="model.name" required>
          </div>
          <div class="mb-3">
            <label for="typeImage" class="form-label">Type Image</label>
            <input type="file" class="form-control" id="typeImage" @change="handleImageChange" accept="image/*">
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
  name: 'TypeUpdate',
  data() {
    return {
      typeId: '',
      model: {
        name: '',
        image: null,
      }
    }
  },
  mounted() {
    this.typeId = this.$route.params.id;
    this.getTypeData(this.typeId);
  },
  methods: {
    getTypeData(typeId) {
      axios.get(`http://127.0.0.1:8000/api/types/${typeId}/edit`)
        .then(res => {
          this.model.name = res.data.name;
        })
        .catch(error => {
          console.error('Error fetching type data:', error);
        });
    },
    handleImageChange(event) {
      this.model.image = event.target.files[0];
    },
    updateType() {
      let formData = new FormData();
      formData.append('name', this.model.name);
      formData.append('image', this.model.image);

      if (!this.typeId) {
        console.error('Type ID is empty. Unable to update type.');
        return;
      }

      axios.put(`http://127.0.0.1:8000/api/types/${this.typeId}/update`, formData)
        .then(res => {
          console.log('Type updated successfully:', res.data);
        })
        .catch(error => {
          console.error('Error updating type:', error);
        });
    },
  }
}
</script>
