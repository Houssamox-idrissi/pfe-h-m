<template>
  <div class="card">
    <div class="card-body">
      <h1 class="card-title font-bold text-3xl text-center text-slate-600" style="font-family: 'Minerva-modern';">Create Glasses</h1>
      <form @submit.prevent="saveGlasses">
        <div class="mb-3">
          <label for="glassesModel" class="form-label" style="font-family: 'Minerva-modern';">Glasses Model</label>
          <input type="text" class="form-control" id="glassesModel" v-model="model.Model" required>
        </div>
        <div class="mb-3">
          <label for="glassesPrice" class="form-label" style="font-family: 'Minerva-modern';">Glasses Price</label>
          <input type="number" class="form-control" id="glassesPrice" v-model="model.Price" required>
        </div>
        <div class="mb-3">
          <label for="glassesSize" class="form-label" style="font-family: 'Minerva-modern';">Glasses Size</label>
          <input type="text" class="form-control" id="glassesSize" v-model="model.size" required>
        </div>
        <div class="mb-3">
          <label for="glassesImage" class="form-label" style="font-family: 'Minerva-modern';">Glasses Image</label>
          <input type="file" class="form-control" id="glassesImage" @change="handleImageChange" accept="image/*" required>
        </div>
        <div class="mb-3">
          <label for="glassesBrand" class="form-label" style="font-family: 'Minerva-modern';">Brand</label>
          <select class="form-select" id="glassesBrand" v-model="model.brand_id" required>
            <option disabled value="">Select Brand</option>
            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{ brand.name }}</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="glassesType" class="form-label" style="font-family: 'Minerva-modern';">Type</label>
          <select class="form-select" id="glassesType" v-model="model.type_id" required>
            <option disabled value="">Select Type</option>
            <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="glassesCategory" class="form-label" style="font-family: 'Minerva-modern';">Category</label>
          <select class="form-select" id="glassesCategory" v-model="model.category_id" required>
            <option disabled value="">Select Category</option>
            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
          </select>
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
  name: 'GlassesCreate',
  data() {
    return {
      model: {
        Model: '',
        Price: '',
        size: '',
        image: null,
        brand_id: null,
        type_id: null,
        category_id: null
      },
      brands: [],
      types: [],
      categories: []
    }
  },
  mounted() {
    this.getBrands();
    this.getTypes();
    this.getCategories();
  },
  methods: {
    handleImageChange(event) {
      this.model.image = event.target.files[0];
    },
    getBrands() {
      axios.get('http://127.0.0.1:8000/api/brands')
      .then(res => {
        this.brands = res.data;
      })
      .catch(error => {
        console.error('Error fetching brands:', error);
      });
    },
    getTypes() {
      axios.get('http://127.0.0.1:8000/api/types')
      .then(res => {
        this.types = res.data;
      })
      .catch(error => {
        console.error('Error fetching types:', error);
      });
    },
    getCategories() {
      axios.get('http://127.0.0.1:8000/api/categories')
      .then(res => {
        this.categories = res.data;
      })
      .catch(error => {
        console.error('Error fetching categories:', error);
      });
    },
    saveGlasses() {
      let formData = new FormData();
      formData.append('Model', this.model.Model);
      formData.append('Price', this.model.Price);
      formData.append('size', this.model.size);
      formData.append('image', this.model.image);
      formData.append('brand_id', this.model.brand_id);
      formData.append('type_id', this.model.type_id);
      formData.append('category_id', this.model.category_id);

      axios.post('http://127.0.0.1:8000/api/glasses', formData, {})
      .then(res => {
        console.log(res.data);
        this.model.Model = '';
        this.model.Price = '';
        this.model.size = '';
        this.model.image = null;
        this.model.brand_id = null;
        this.model.type_id = null;
        this.model.category_id = null;
        this.$router.push('/admin/glasses')
      })
      .catch(error => {
        console.error('Error creating glasses:', error);
      });
    },
  }
}
</script>
