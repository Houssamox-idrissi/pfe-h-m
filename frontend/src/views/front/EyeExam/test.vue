
   <form @submit.prevent="submitAppointment">
    <input v-model="name" type="text" placeholder="Full Name" required>
    <input v-model="email" type="email" placeholder="Your Email" required>
    <input v-model="phone" type="tel" placeholder="Your Phone" required>
    <input v-model="appointmentDatetime" type="datetime-local" required>
    <textarea v-model="message" placeholder="Additional Message"></textarea>
    <button type="submit">Submit Appointment</button>
  </form>
  <script>
  import axios from 'axios';
  
  export default {
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
  