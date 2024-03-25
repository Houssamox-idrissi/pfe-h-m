import { createRouter, createWebHistory } from 'vue-router'
import AdminLayout from '../layouts/Admin.vue'
import ClientLayout from '../layouts/Admin.vue'

// client
import HomeClient from '../views/front/home/clientHome.vue'
import AuthClient from '../views/front/auth/register.vue'
import loginClient from '../views/front/auth/login.vue'

import EyeglassesClient from '../views/front/Eyeglasses/Eyeglasses.vue'
import MenEyeglassesClient from '../views/front/Eyeglasses/MenEyeglasses.vue'
import WomenEyeglassesClient from '../views/front/Eyeglasses/WomenEyeglasses.vue'
import KidsEyeglassesClient from '../views/front/Eyeglasses/KidsEyeglasses.vue'

import SunglassesClient from '../views/front/Sunglasses/Sunglasses.vue'
import MenSunglassesClient from '../views/front/Sunglasses/MenSunglasses.vue'
import WomenSunglassesClient from '../views/front/Sunglasses/WomenSunglasses.vue'
import KidsSunglassesClient from '../views/front/Sunglasses/KidsSunglasses.vue'

import BrandsClient from '../views/front/brands/brands.vue'
import BrdGlasseClient from '../views/front/brands/brandsGlasses.vue'
import ExamClient from '../views/front/EyeExam/eyeExam.vue'

// admin panel
import CategoryView from '../views/adminPanel/categories/view.vue'
import CreateView from '../views/adminPanel/categories/create.vue'
import EditView from '../views/adminPanel/categories/edit.vue'

import BrandView from '../views/adminPanel/brands/index.vue'
import CreateBView from '../views/adminPanel/brands/createb.vue'
import EditBView from '../views/adminPanel/brands/editb.vue'

import TypeView from '../views/adminPanel/Types/indexType.vue'
import TypeCreateView from '../views/adminPanel/Types/createy.vue'
import TypeEditView from '../views/adminPanel/Types/edity.vue'

import GlasseView from '../views/adminPanel/glasses/indexGlasse.vue'
import GlasseCreateView from '../views/adminPanel/glasses/createg.vue'
import GlaView from '../views/adminPanel/glasses/editg.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
  //  Admin
    {
      path: '/admin',
      component: AdminLayout,
      children: [
        // Category
        {
          path: 'categories',
          name: 'categories',
          component: CategoryView
        },
        {
          path: 'category/create',
          name: 'CategoryCreate',
          component: CreateView
        },
        {
          path: 'categories/:id/edit',
          name: 'CategoryEdit',
          component: EditView
        },
        // Brand
        {
          path: 'brands',
          name: 'bran',
          component: BrandView
        },
        {
          path: 'brand/create',
          name: 'BrandCreate',
          component: CreateBView
        },
        {
          path: 'brands/:id/edit',
          name: 'BrandEdit',
          component: EditBView
        },
        // Type
        {
          path: 'types',
          name: 'type',
          component: TypeView
        },
        {
          path: 'type/create',
          name: 'TypeCreate',
          component: TypeCreateView
        },
        {
          path: 'types/:id/edit',
          name: 'TypeEdit',
          component: TypeEditView
        },
        // Glasses
        {
          path: 'glasses',
          name: 'glasses',
          component: GlasseView
        },
        {
          path: 'glasses/create',
          name: 'GlasseCreate',
          component: GlasseCreateView
        },
        {
          path: 'glasses/:id/edit',
          name: 'GlasseEdit',
          component: GlaView
        },
      ],
      meta: { layout: 'admin' }
    },

    // Client
    {
      path: '/client',
      component: ClientLayout,
      children: [
        {
          path: 'register',
          name:'register',
          component:AuthClient
        },
        {
          path: 'login',
          name:'login',
          component:loginClient
        },
        {
          path: 'home',
          name:'home',
          component:HomeClient
        },
        {
          path: 'eyeglasses',
          name:'eyeglasses',
          component:EyeglassesClient
        },
        {
          path: 'menEyeglasses',
          name:'menEyeglasses',
          component:MenEyeglassesClient
        },
        {
          path: 'womenEyeglasses',
          name:'womenEyeglasses',
          component:WomenEyeglassesClient
        },
        {
          path: 'kidsEyeglasses',
          name:'kidsEyeglasses',
          component:KidsEyeglassesClient
        },
        {
          path: 'sunglasses',
          name:'sunglasses',
          component:SunglassesClient
        },
        {
          path: 'WomenSunglasses',
          name:'WomenSunglasses',
          component:WomenSunglassesClient
        },
        {
          path: 'MenSunglasses',
          name:'MenSunglasses',
          component:MenSunglassesClient
        },
        {
          path: 'kidsSunglasses',
          name:'kidsSunglasses',
          component:KidsSunglassesClient
        },
        {
          path: 'brands',
          name:'brands',
          component:BrandsClient
        },
        {
          path: 'brandsGlasses',
          name:'brandsGlasses',
          component:BrdGlasseClient
        },
        {
          path: 'eyeExam',
          name:'eyeExam',
          component:ExamClient
        },
        // Other routes...
      ],
      meta: { layout: 'client' }
    },
  ]
})
export default router
