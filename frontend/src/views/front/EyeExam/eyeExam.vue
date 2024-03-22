<template>
  <navbar />
  <br><br><br>
  
  <form @submit.prevent="submitAppointment" class="bg-white shadow-md rounded px-4 pt-4 pb-6 mb-2 flex flex-col my-2">
    <h1 class="text-center mb-8" style=" font-weight: bold; line-height: 1; letter-spacing: -0.025em; color: black;">
    Optician Appointment
  </h1>
          <br>
    <div class="-mx-3 px-5 md:flex mb-6">
      <!-- First Name Input -->
      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
          First Name
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" v-model="firstName" type="text" placeholder="FirstName">
      </div>
      <!-- Last Name Input -->
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
          Last Name
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" v-model="lastName" type="text" placeholder="LastName" required>
      </div>
    </div>

    <div class="-mx-3 px-5 md:flex mb-6">
      <!-- Email Input -->
      <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-email">
          Email
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" v-model="email" type="email" placeholder="Email" required>
      </div>
      <!-- Phone Input -->
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-phone">
          Phone
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" v-model="phone" type="tel" placeholder="Phone" required>
      </div>
    </div>

    <div class="-mx-3 px-5 md:flex mb-2">
      <!-- Date Input -->
      <div class="md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-date">
          Date
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" v-model="appointmentDatetime" type="datetime-local" placeholder="Date" aria-required="">
      </div>
      <!-- Message Input -->
      <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-message">
          Message
        </label>
        <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" v-model="message" placeholder="Type your message here..."></textarea>
      </div>
    </div>
    <div class="md:w-1/3 px-5 mb-6 md:mb-0">
      <button type="submit" class="py-2 px-4 rounded-lg text-white hover:bg-green-500 focus:outline-none focus:bg-green-500 transition duration-300 btn btn-info ">Submit Appointment</button>
      </div>
    <!-- Submit Button -->
   
  </form>
  
  <Footer></Footer>
</template>

<script>
import navbar from '@/components/navbar.vue';
import Footer from '@/components/f.vue';
import axios from 'axios';

export default {
  components: {
    navbar,
    Footer
  },
  data() {
    return {
      firstName: '',
      lastName:'',
      email: '',
      phone: '',
      appointmentDatetime: '',
      message: '',
    };
  },
  methods: {
    submitAppointment() {
      const token = localStorage.getItem('jwt_token');
      const requestData = {
        firstName: this.firstName,
        lastName:this.lastName,
        email: this.email,
        phone: this.phone,
        appointment_datetime: this.appointmentDatetime,
        message: this.message,
      };

      axios.post('http://127.0.0.1:8000/api/appointments', requestData, {
        headers: {
          Authorization: `Bearer ${token}`, 
        }
      })
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  }
};
</script>
