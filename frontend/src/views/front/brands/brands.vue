<template>
    <div class="antialiased bg-black w-full min-h-screen text-slate-300 relative py-4">
      <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
        <div id="menu" class="bg-white/10 col-span-3 rounded-lg p-4">
          <h1 class="font-bold text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text text-transparent">
            Dashboard<span class="text-indigo-400">.</span>
          </h1>
          <p class="text-slate-400 text-sm mb-2">Welcome back,</p>
          <router-link to="/profile" class="flex flex-col space-y-2 md:space-y-0 md:flex-row mb-5 items-center md:space-x-2 hover:bg-white/10 group transition duration-150 ease-linear rounded-lg group w-full py-3 px-2">
            <div>
              <img class="rounded-full w-10 h-10 relative object-cover" src="https://img.freepik.com/free-photo/no-problem-concept-bearded-man-makes-okay-gesture-has-everything-control-all-fine-gesture-wears-spectacles-jumper-poses-against-pink-wall-says-i-got-this-guarantees-something_273609-42817.jpg?w=1800&t=st=1669749937~exp=1669750537~hmac=4c5ab249387d44d91df18065e1e33956daab805bee4638c7fdbf83c73d62f125" alt="">
            </div>
            <div>
              <p class="font-medium group-hover:text-indigo-400 leading-4">Jim Smith</p>
              <span class="text-xs text-slate-400">Pantazi LLC</span>
            </div>
          </router-link>
          <hr class="my-2 border-slate-700">
          <div id="menu" class="flex flex-col space-y-2 my-5">
            <router-link to="/dashboard" class="hover:bg-white/10 transition duration-150 ease-linear rounded-lg py-3 px-2 group">
              <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 space-x-2 items-center">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:text-indigo-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>
                </div>
                <div>
                  <p class="font-bold text-base lg:text-lg text-slate-200 leading-4 group-hover:text-indigo-400">Dashboard</p>
                  <p class="text-slate-400 text-sm hidden md:block">Data overview</p>
                </div>
              </div>
            </router-link>
            <!-- Add similar router-link elements for other navigation items -->
          </div>
          <p class="text-sm text-center text-gray-600">v2.0.0.3 | &copy; 2022 Pantazi Soft</p>
        </div>
        <div id="content" class="bg-white/10 col-span-9 rounded-lg p-6">
          <!-- Your content goes here -->
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Dashboard',
    // You can add your Vue component logic here
  }
  </script>
  
  <style scoped>
 :root { font-family: 'Inter', sans-serif; }
@supports (font-variation-settings: normal) {
  :root { font-family: 'Inter var', sans-serif; }
}
  </style>
  