<template>
    <nav class="static w-full bg-slate-850">
            <div class="container flex justify-between items-center py-6">
                <div class=" px-16 flex items-center space-x-6 capitalize">
                    <router-link to="/client/home"
                        class="transition text-slate-400 hover:text-white link">HOME</router-link>
                    <router-link to="/client/eyeglasses"
                        class="transition text-slate-400 hover:text-white link">EYEGLASSES</router-link>
                    <router-link to="/client/sunglasses"
                        class="transition text-slate-400 text- hover:text-white link">SUNGLASSES</router-link>
                    <router-link to="/client/brands"
                        class="transition text-slate-400 hover:text-white link">BRANDS</router-link>
                    <router-link to="/client/eyeExam" class="transition text-slate-400 hover:text-white link">EYE
                        EXAM</router-link>
                </div>
                <router-link to="/client/register"
                    class="px-5 transition text-slate-400 hover:text-white link">SIGN UP</router-link>
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
