<template>
  <div>
    <navbar />
    <div class="flex px-16  mt-12">
      <div class="bg-gray-50 w-10/12" v-if="glasses">
        <img :src="'http://127.0.0.1:8000/storage' + glasses.brand.image.replace('public', '')" :alt="glasses.name"
          class="w-28 ">
        <h1 class="text-3xl text-center mb-4 text-lg">Most Popular</h1>
        <img :src="'http://127.0.0.1:8000/storage' + glasses.image.replace('public', '')" :alt="glasses.name"
          class="w-6/12 mx-auto">
      </div>
      <div class="px-8 mt-2" v-if="glasses">
        <h2 class="text-slate-600 text-lg font-bold uppercase mt-2">{{ glasses.brand.name }}</h2>
        <p class="text-xs text-gray-500 font-semibold">{{ glasses.Model }}</p><br><br><br><br><br><br><br>
        <p class="font-bold">Size <span class="font-bold uppercase text-black"
            style="margin-left: 110px;font:13px Minerva Modern, sans-serif;">{{ glasses.size }}</span></p>
        <p class="font-bold uppercase">Frame<span class="font-bold text-black"
            style="margin-left: 85px;font:13px Minerva Modern, sans-serif;">${{ glasses.Price }}</span></p>
        <div class="mr-2">
          <button @click="ShopFrame" class="bg-black text-white py-2 px-8 rounded-full">SHOP FRAME</button>
          <div class="mt-2"></div>
          <button @click="selectLenses" class="bg-black text-white py-3 px-8 rounded-full">FRAME&LENSES</button>
        </div>



      </div>
    </div>

    <div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import axios from 'axios';
import Navbar from '@/components/navbar.vue';
import Footer from '@/components/f.vue';

export default {
  components: {
    Navbar,
    Footer
  },
  data() {
    return {
      glasses: null
    };
  },
  mounted() {
    this.getGlassesDetails();
  },
  methods: {
    getGlassesDetails() {
      const glassesId = this.$route.params.id;
      axios.get(`http://127.0.0.1:8000/api/glasses/${glassesId}/details`)
        .then(res => {
          this.glasses = res.data;
        })
        .catch(error => {
          console.error('Error fetching glasses details:', error);
        });
    },


    ShopFrame() {
      this.$router.push({
        name: 'Payment',
      });
    },

    selectLenses() {
      if (this.glasses && this.glasses.id) {
        this.selectedGlassesId = this.glasses.id;
        this.$router.push({
          name: 'LensInsertion',
          params: {
            glassesId: this.selectedGlassesId
          }
        });
      } else {
        console.error('Glasses details not available');
      }
    }


  }
};
</script>
