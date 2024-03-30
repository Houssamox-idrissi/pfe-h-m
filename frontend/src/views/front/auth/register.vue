<template>
  <navbar />
  <section class="px-5 py-1 bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <br><br><br>
      <div
        class="px-5 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1
          class=" text-center text-3xl text-black capitalize font-lighter">
            Sign up
          </h1>
          <br>
          <form @submit.prevent="register" class="space-y-4 md:space-y-6">
            <input type="text" v-model="name" placeholder="Name" required
              class="bg-gray-50 border border-secondary text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block px-5  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <br>
            <input type="email" v-model="email" placeholder="Email" required
              class="bg-gray-50 border border-secondary text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block px-5  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               <br>
            <input type="password" v-model="password" placeholder="Password"
              class="px-5 bg-gray-50 border border-secondary text-gray-900 sm:text-sm rounded-lg "
              required>
            <div class="flex items-center justify-between">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" aria-describedby="remember" type="checkbox"
                    class="w-4 h-4 border border-secondary rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                    required>
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
              </div>
            </div>
            <p class="px-2 mt-4 text-gray-600">You have an account? <router-link to="/client/login"
                class="text-indigo-500">Log in</router-link>
            </p>
            <button type="submit"
              class="bg-black text-white px-8 py-2 rounded-full">Sign
              up</button>
          </form>
        </div>
      </div>
    </div>
    <br><br><br>
  </section>
  <Footer></Footer>
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

<style>
.font-lighter {
  font-family: '', sans-rif;
  font-weight: 600;
}
</style>