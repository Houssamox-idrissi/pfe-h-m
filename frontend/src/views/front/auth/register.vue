<template>
  <div>
    <navbar />
    <br><br><br>
    <div class="max-w-md mx-auto mt-8 px-5">
      <h2 class="text-3xl font-bold mb-6 times-new-roman">Create an account</h2>
      <form @submit.prevent="register" class="space-y-4">
        <div>
          <input type="text" v-model="name" placeholder="Name" required
            class="px-5 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500" />
        </div>
        <div>
          <input type="email" v-model="email" placeholder="Email" required
            class=" px-5 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500" />
        </div>
        <div>
          <input type="password" v-model="password" placeholder="Password" required
            class=" px-5 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500" />
        </div>
        <button type="submit"
          class=" py-2 px-4 rounded-lg text-white hover:bg-green-500 focus:outline-none focus:bg-green-500 transition duration-300 btn btn-info">Register</button>
      </form>
      <p class="mt-4 text-gray-600">Already have an account? <router-link to="/client/login"
          class="text-indigo-500">Login</router-link></p>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import axios from 'axios'
import navbar from '@/components/navbar.vue';
import Footer from '@/components/f.vue';

export default {
  components: {
    navbar,
    Footer
  },
  data() {
    return {
      name: '',
      email: '',
      password: ''
    };
  },
  methods: {
    register() {
      axios.post('http://127.0.0.1:8000/api/register', {
        name: this.name,
        email: this.email,
        password: this.password
      })
        .then(response => {
          console.log(response.data);
          this.$router.push('/client/login');
        })
        .catch(error => {
          console.error('Error during registration:', error);
        });
    }
  }
};
</script>

<style scoped>
input[type="text"],
input[type="email"],
input[type="password"] {
  transition: border-color 0.2s ease-in-out;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
  border-color: #05041f;
}

button[type="submit"] {
  transition: background-color 0.2s ease-in-out;
}

button[type="submit"]:hover {
  background-color: #34D399;
}
.times-new-roman {
        font-family: "Times New Roman", Times, serif;
    }

</style>
