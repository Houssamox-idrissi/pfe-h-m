<template>
    <div>
        <navbar />
        <div class="flex px-16  mt-12">
            <div class="bg-gray-50 w-10/12" v-if="glasses">
                <img :src="'http://127.0.0.1:8000/storage' + glasses.brand.image.replace('public', '')"
                    :alt="glasses.name" class="w-28 bottom-0">
                <img :src="'http://127.0.0.1:8000/storage' + glasses.image.replace('public', '')" :alt="glasses.name"
                    class="w-6/12 mx-auto">
            </div>
        
            <div class="px-16 mt-2" v-if="glasses">
                <div class="card ">
                    <div class="card-body">
                        <h1 class="card-title font-bold text-3xl text-center text-slate-600 font-minerva" style="font-family: cursive;">Prescription</h1>
                        <form @submit.prevent="submitForm">
                            <div class="mb-3">
                                <label for="prescriptionImage" class="form-label font-minerva">Prescription
                                    Image</label>
                                <input type="file" class="form-control" @change="handleImageChange" accept="image/*"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label font-minerva">Have us call your doctor <span class="text-xs font-semibold"> (optional)</span></label>
                                <input type="tel" class="form-control" v-model="prescription.phone" pattern="[0-9]*" placeholder="Doctor phone ">
                            </div>
                            <button type="submit" class="bg-black px-4 py-2 rounded-full text-white">Next</button>
                        </form>
                    </div>
                </div>
                <br>
                <h2 class="text-slate-600 text-lg font-bold uppercase mt-2">{{ glasses.brand.name }}</h2>
                <p class="text-xs text-gray-500 font-semibold">{{ glasses.Model }}</p>
                <p class="font-bold">Size <span class="font-bold uppercase text-black"
                        style="margin-left: 110px;font:13px Minerva Modern, sans-serif;">{{ glasses.size }}</span></p>
                <p class="font-bold uppercase">Frame<span class="font-bold text-black"
                        style="margin-left: 85px;font:13px Minerva Modern, sans-serif;">${{ glasses.Price }}</span></p>
                <div class="mt-2"></div>

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
            prescription: {
                image: null,
                phone: ''
            },
            glasses: null,
        };
    },
    mounted() {
        this.getGlassesDetails();
    },
    methods: {
        getGlassesDetails() {
            const glassesId = this.$route.params.glassesId;
            console.log(glassesId)
            axios.get(`http://127.0.0.1:8000/api/glasses/${glassesId}/details`)
                .then(res => {
                    this.glasses = res.data;
                })
                .catch(error => {
                    console.error('Error fetching glasses details:', error);
                });
        },

        handleImageChange(event) {
            this.prescription.image = event.target.files[0];
        },
        submitForm() {
            const formData = new FormData();
            formData.append('image', this.prescription.image);
            formData.append('phone', this.prescription.phone);

            axios.post('http://127.0.0.1:8000/api/prescriptions', formData)
                .then(response => {
                    console.log('Prescription saved successfully:', response.data);
                    this.resetForm();
                })
                .catch(error => {
                    console.error('Error saving prescription:', error);
                });
                this.$router.push('/client/PaymentFrame')
        },
        resetForm() {
            this.prescription.image = null;
            this.prescription.phone = '';
        }
    }

};
</script>