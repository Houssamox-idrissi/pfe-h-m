<template>
    <div class="py-4 shadow-sm bg-white">
        <div class="container flex items-center justify-between">
            <img src="" alt="Logo" class="w-32">
            <div class="flex items-center space-x-4">
                <a href="#" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <nav class="bg-gray-800 w-full">
        <div class="container flex">
            <div class="px-8 py-4 bg-primary md:flex items-center cursor-pointer relative group hidden">
            </div>
            <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
                <div class="flex items-center space-x-6 capitalize">
                    <router-link to="/client/home"
                        class="text-gray-200 hover:text-white transition link">HOME</router-link>
                    <router-link to="/client/eyeglasses"
                        class="text-gray-200 hover:text-white transition link">EYEGLASSES</router-link>
                    <router-link to="/client/sunglasses"
                        class="text-gray-200 hover:text-white transition link">SUNGLASSES</router-link>
                    <router-link to="/client/brands"
                        class="text-gray-200 hover:text-white transition link">BRANDS</router-link>
                    <router-link to="/client/eyeExam" class="text-gray-200 hover:text-white transition link">EYE
                        EXAM</router-link>
                </div>
                <router-link to="/client/register"
                    class=" px-5 text-gray-200 hover:text-white transition link">REGISTER</router-link>
            </div>
        </div>
    </nav>
</template>

<style>
.link {
    text-decoration: none;
}

nav {
    width: 100%;
}
</style>
