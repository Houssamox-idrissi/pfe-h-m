<template>
  <div>
    <!-- Navbar -->


    <div>
      <navbar />
      <div class="bg-center bg-no-repeat bg-cover py-36 ot">
        <div class="container">
          <h1 class="mb-4 text-3xl font-medium text-white capitalize"
            style="font-family: 'Arial Black', sans-serif; text-shadow: 2px 2px 4px rgba(0,0,0,0.4);">
            Our vision for your<br> eye care.
          </h1>

          <p class="font-medium text-white">Discover a world of clarity and style
            at our optical store,<br> From chic frames to personalized eye exams, we're here<br>
            to elevate your vision experience. Book your appointment<br> today and see the difference.</p>
          <!-- <div class="mt-12">
            <a href="#" class="px-5 py-3 font-medium text-white border rounded-md bg-primary border-primary hover:bg-transparent hover:text-primary link">Shop Now</a>
          </div> -->
        </div>
      </div>
      <!-- ./banner -->

      <!-- features -->
      <div class="container py-16">
        <div class=" grid justify-center w-10/12 grid-cols-1 gap-6 mx-auto md:grid-cols-3">
          <div data-aos="fade-right"
            class="flex items-center justify-center gap-5 px-3 py-2 border rounded-sm border-secondary">
            <img src="./image/delivery-van.svg" alt="Delivery" class="object-contain w-12 h-12">
            <div>
              <h4 class="text-lg font-medium capitalize">Free Shipping</h4>
              <p class="text-sm text-gray-500">Order over $200</p>
            </div>
          </div>
          <div data-aos="zoom-in"
            class="flex items-center justify-center gap-5 px-3 py-6 border rounded-sm border-secondary">
            <img src="./image/money-back.svg" alt="Delivery" class="object-contain w-12 h-12">
            <div>
              <h4 class="text-lg font-medium capitalize">Money returns</h4>
              <p class="text-sm text-gray-500">30 days money returns</p>
            </div>
          </div>
          <div data-aos="fade-left"
            class="flex items-center justify-center gap-5 px-3 py-6 border rounded-sm border-secondary">
            <img src="./image/service-hours.svg" alt="Delivery" class="object-contain w-12 h-12">
            <div>
              <h4 class="text-lg font-medium capitalize">24/7 Support</h4>
              <p class="text-sm text-gray-500">Customer support</p>
            </div>
          </div>
        </div>
      </div>
      <!-- ./features -->
      <!-- categories -->
      <div class="container py-16">
        <h2 class=" mb-4 px-8 text-slate-600 text" style="font: 32px Minerva Modern, sans-serif;">Our Top Picks</h2>

        <div class="grid grid-cols-4 gap-3 ">

          <div v-for="(glasses, index) in glassesList.slice(0,4)" :key="index" data-aos="zoom-in"
            class="bg-gray-50 py-16 relative overflow-hidden group rounded-sm">
            <img :src="'http://127.0.0.1:8000/storage' + glasses.image.replace('public', '')" :alt="glasses.name"
              class="w-full transition-transform transform-glasses hover:scale-105">
          </div>

          <div v-for="(glasses, index) in glassesList.slice(0,4)" :key="index"
            class="bg relative overflow-hidden group rounded-sm ">
            <router-link :to="{path:'/client/glasses/'+ glasses.id + '/details'}" class="text-gray-800 text-sm font-bold">
              {{ glasses.brand.name }}
            </router-link><br>
            <router-link :to="{path:'/client/glasses/'+ glasses.id + '/details'}" class="text-gray-400 text-xs">
              {{ glasses.Model }}
            </router-link>
            <div  class="mt-2 text-xs text-gray-800 font-semibold ">
              From {{ glasses.Price }}$
            </div>
          </div>
        </div>
      </div>
      <!-- ./categories -->

      <!-- ads -->
      <div class="container w-full px-16">
        <a href="#">
          <img src="./image/HH.png" alt="ads" class="w-full ">
        </a>
      </div>
      <!-- ./ads --><br><br><br><br>

      <!-- new arrival -->
      <div class="container py-16">
        <h2 class=" mb-4 px-8 text-slate-600" style="font: 32px Minerva-modern, sans-serif;">Designer Sale:<br>
          Get 60% off! </h2>
        <div class="grid grid-cols-4 gap-3 ">

          <div v-for="(glasses, index) in glassesList.slice(0,4)" :key="index" data-aos="zoom-in"
            class="bg-gray-50 py-16 relative overflow-hidden group rounded-sm">
            <img :src="'http://127.0.0.1:8000/storage' + glasses.image.replace('public', '')" :alt="glasses.name"
              class="w-full transition-transform transform-glasses hover:scale-105">
          </div>

          <div v-for="(glasses, index) in glassesList.slice(0,4)" :key="index"
            class="bg relative overflow-hidden group rounded-sm ">
            <router-link :to="{path:'/client/glasses/'+ glasses.id + '/details'}" class="text-gray-800 text-sm font-bold">
              {{ glasses.brand.name }}
            </router-link><br>
            <router-link :to="{path:'/client/glasses/'+ glasses.id + '/details'}" class="text-gray-400 text-xs">
              {{ glasses.Model }}
            </router-link>
            <div class="mt-2 text-xs text-gray-800 font-semibold ">
              From {{ glasses.Price }}$
            </div>
          </div>
        </div>
      </div>
      <!-- ./new arrival -->
    </div>


    <!-- footer -->
    <Footer></Footer>
  </div>
</template>

<script>

import navbar from '@/components/navbar.vue';
import Footer from '@/components/f.vue';
import axios from 'axios';
import AOS from 'aos'
import 'aos/dist/aos.css'
export default {
  data() {
    return {
      glassesList: []
    };
  },
  mounted() {
    this.getGlasses();
    setTimeout(() => {
      AOS.init({
      });
    }, 1500);
  },
  methods: {
    getGlasses() {
      axios.get('http://127.0.0.1:8000/api/glasses')
        .then(res => {
          this.glassesList = res.data;
        });
    },
    deleteGlasses(glassesId) {
      if (confirm("Are you sure?")) {
        axios.delete(`http://127.0.0.1:8000/api/glasses/${glassesId}/delete`)
          .then(res => {
            console.log("hello");
            this.getGlasses();
          });
      }
    }
  },

  computed: {
    filteredGlassesList() {
      return this.glassesList.filter(glasses => glasses.id > 6);
    }
  },

  name: 'Home',
  components: {
    navbar,
    Footer
  }
};


</script>

<style>
.transform-glasses {
  transition: transform 0.5s ease;
}

.transform-glasses:hover {
  transform: scale(1.15);
}

.ot {
  background-image: url('@/assets/home.png');
}


</style>