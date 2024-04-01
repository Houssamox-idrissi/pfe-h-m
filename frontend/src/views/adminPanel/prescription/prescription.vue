<template>
    <main>
      <div style="margin-bottom: 20px;"></div>
      <table class="table border-collapse border rounded-lg overflow-hidden table-striped" >
  
        <thead class="table-dark">
          <tr>
            <th class="text-center">Doctor Phone</th>
            <th class="px-5">Image</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>djzxnjzjojxnj
        <tbody>
          <tr v-for="(prescription, index) in prescriptions" :key="index" class="text-center">
            <td class="mr-24 bt-8" style="font-family: 'Arial', sans-serif; font-size: 16px; font-weight: bold; color: #333;">{{ prescription.phone }}</td>
  
            <td>
              <img :src="'http://127.0.0.1:8000/storage' + prescription.image.replace('public', '')" class="img-fluid"
                style="max-width: 100px;">
            </td>
            <td class="mr-24">  
              <button type="button" @click="deletePrescription(prescription.id)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="mr-2 inline-block w-6 h-6">
                  <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                </svg>
              </button>
            </td>
  
          </tr>
        </tbody>
      </table>
    </main>
  </template>
  
  <script>
  import axios from 'axios'
  
  export default {
    name: 'prescription',
    data() {
      return {
        prescriptions: []
      };
    },
    mounted() {
      this.getPrescriptions();
    },
    methods: {
      getPrescriptions() {
        axios.get('http://127.0.0.1:8000/api/prescriptions').then(res => {
          this.prescriptions = res.data;
          // Log image URLs if needed
          console.log('Image URLs:', this.prescriptions.map(prescription => prescription.image));
        });
      },
  
      deletePrescription(prescriptionId) {
        if (confirm("Are you sure?")) {
          axios.delete(`http://127.0.0.1:8000/api/prescriptions/${prescriptionId}`).then(res=>{
            this.getPrescriptions();
          });
        }
      }
    }
  }
  </script>
  