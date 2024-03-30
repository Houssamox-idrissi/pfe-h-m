<template>
     <navbar></navbar>
    <div class="container py-16">
        <h2 class="mb-4 px-8 text-slate-600 text" style="font: 32px Minerva Modern, sans-serif;">Kids Eyeglasses</h2>

        <!-- Display eyeglasses in rows -->
        <div class="grid grid-cols-4 gap-6">
            <div v-for="(glasses, index) in eyeglassesList" :key="index"
                class="flex flex-col bg-gray-50 rounded-lg shadow-md overflow-hidden">
                <!-- Image -->
                <img :src="'http://127.0.0.1:8000/storage' + glasses.image.replace('public', '')" :alt="glasses.name"
                    class="w-full h-64 object-cover">

                <!-- Information -->
                <div class="p-4">
                    <router-link :to="{ path: '/client/glasses/' + glasses.id + '/details' }"
                        class="text-gray-800 text-lg font-bold mb-2">
                        {{ glasses.brand.name }}<br>
                    </router-link>
                    <router-link :to="{ path: '/client/glasses/' + glasses.id + '/details' }"
                        class="text-gray-600 text-sm mb-4">
                        {{ glasses.Model }}
                    </router-link>
                    <div class="text-gray-700 text-sm font-semibold">
                        From {{ glasses.Price }}$
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import axios from 'axios';
import navbar from '@/components/navbar.vue';
import Footer from '@/components/f.vue';

export default {
    data() {
        return {
            glassesList: [],
            eyeglassesList: []
        };
    },
    mounted() {
        this.getGlasses();
    },
    methods: {
        getGlasses() {
            axios.get('http://127.0.0.1:8000/api/glasses')
                .then(res => {
                    this.glassesList = res.data;
                    this.eyeglassesList = this.glassesList.filter(glasses => glasses.category.name === 'Eyeglasses' && glasses.type.name === 'Kids Eyeglasses');
                });
        },
    },
    components: {
        navbar,
        Footer
    }
};

</script>

<style>
/* Add your custom styles here */
</style>