<template>
    <main>
      <router-link to="/admin/appointments/create" class="btn btn-secondary" style="font-family: 'Arial', sans-serif; font-size: 18px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 mr-3">
          <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
        </svg>
        Eye Exam
      </router-link>
      <div style="margin-bottom: 20px;"></div>
      <table class="table overflow-hidden border-collapse rounded-lg table-striped">
        <thead class="table-dark">
          <tr>
            <th class="">First Name</th>
            <th class="">Last Name</th>
            <th class="">Email</th>
            <th class="">Phone</th>
            <th class="">Appointment Date and Time</th>
            <th >Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(appointment, index) in appointments" :key="index" class="px-5">
            <td>{{ appointment.firstName }}</td>
            <td>{{ appointment.lastName }}</td>
            <td>{{ appointment.email }}</td>
            <td>{{ appointment.phone }}</td>
            <td >{{ appointment.appointment_datetime }}</td>
            <td class="mr-24">
              <button type="button" @click="deleteAppointment(appointment.id)" class="mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="inline-block w-6 h-6 mr-1">
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
  import axios from 'axios';
  import { RouterLink } from 'vue-router';
  
  export default {
    name: 'EyeExams',
    data() {
      return {
        appointments: []
      };
    },
    mounted() {
      this.getAppointments();
    },
    methods: {
      getAppointments() {
        axios.get('http://127.0.0.1:8000/api/appointments')
          .then(res => {
            this.appointments = res.data;
          })
          .catch(error => {
            console.error('Error fetching appointments:', error);
          });
      },
      deleteAppointment(appointmentId) {
        if (confirm("Are you sure you want to delete this appointment?")) {
          axios.delete(`http://127.0.0.1:8000/api/appointments/${appointmentId}/delete`)
            .then(res => {
              this.getAppointments();
            })
            .catch(error => {
              console.error('Error deleting appointment:', error);
            });
        }
      }
    },
    components: { RouterLink }
  }
  </script>
  