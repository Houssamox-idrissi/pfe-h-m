<template>
  <main>
    <router-link to="/admin/type/create" class="btn btn-primary">Add Type</router-link>
    <div style="margin-bottom: 20px;"></div>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(type, index) in types" :key="index">
          <td>{{ type.name }}</td>
          <td>
            <img :src="'http://127.0.0.1:8000/storage'+type.image.replace('public','')" alt="nothing!" class="img-fluid" style="max-width: 100px;">
          </td>
          <td>
            <RouterLink :to="{ path: '/types/' + type.id + '/edit' }" class="btn btn-success mx-2">Edit
            </RouterLink>
            <button type="button" @click="deleteType(type.id)" class="btn btn-danger mx-2">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
</template>

<script>
import axios from 'axios'
import { RouterLink } from 'vue-router';
export default {
  name: 'types',
  data() {
    return {
      types: []
    };
  },
  mounted() {
    this.getType();
  },
  methods: {
    getType() {
      axios.get('http://127.0.0.1:8000/api/types').then(res => {
        this.types = res.data;
      });
    },

    deleteType(typeId) {
      if (confirm("Are you sure?")) {
        axios.delete(`http://127.0.0.1:8000/api/types/${typeId}/delete`).then(res => {
          this.getType();
        });
      }
    }
  },
  components: { RouterLink }
}
</script>