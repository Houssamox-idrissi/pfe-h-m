import { createRouter, createWebHistory } from 'vue-router'
import AdminLayout from '../layouts/Admin.vue'
import ClientLayout from '../layouts/Admin.vue'


import AdminHomeView from '../views/adminPanel/home/home.vue'
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

import ExamClient from '../views/front/EyeExam/eyeExam.vue'
import ExamView from '../views/adminPanel/eyeExam/exam.vue'

// admin panel
import CategoryView from '../views/adminPanel/categories/view.vue'
import CreateView from '../views/adminPanel/categories/create.vue'
import EditView from '../views/adminPanel/categories/edit.vue'

import BrandView from '../views/adminPanel/brands/index.vue'
import CreateBView from '../views/adminPanel/brands/createb.vue'
import EditBView from '../views/adminPanel/brands/editb.vue'

import TypeView from '../views/adminPanel/Types/indexType.vue'
import TypeEditView from '../views/adminPanel/Types/edity.vue'
import TypeCreateView from '../views/adminPanel/Types/createy.vue'

import GlasseView from '../views/adminPanel/glasses/indexGlasse.vue'
import GlasseCreateView from '../views/adminPanel/glasses/createg.vue'
import GlaView from '../views/adminPanel/glasses/editg.vue'

// BrandsGlasses
import allBrandsClient from '@/views/front/BrandsGlasses/allBrands.vue'
import pradaClient from '@/views/front/BrandsGlasses/prada.vue'
import rayBanClient from '@/views/front/BrandsGlasses/rayBan.vue'
import armaniClient from '@/views/front/BrandsGlasses/armani.vue'

// lenses
import LensInsertion from '../views/front/GlaDetail/lensesStore.vue'
import PaymentClient from '@/views/front/Lenses/payment/payment.vue'
import DetailClient from '@/views/front/GlaDetail/glassesDet.vue'
import FirstPageView from '../views/adminLogin/login.vue'

// Prescription 
import PrescriptionView from '../views/adminPanel/prescription/prescription.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [

    {
      path: '/admin',
      name: 'first',
      component: FirstPageView
    },
       //  Admin
    {
      path: '/admin',
      component: AdminLayout,
      children: [
        {
          path: 'Adminhome',
          name: 'AdminHome',
          component: AdminHomeView
        },
        
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
          path: 'createType/create',
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
        // eye exam
        {
          path: 'exam',
          name: 'exam',
          component: ExamView
        },
        {
          path: 'prescription',
          name: 'prescription',
          component: PrescriptionView
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
          name: 'register',
          component: AuthClient
        },
        {
          path: 'login',
          name: 'login',
          component: loginClient
        },
        {
          path: 'home',
          name: 'home',
          component: HomeClient
        },


        // Eyeglasses
        {
          path: 'eyeglasses',
          name: 'eyeglasses',
          component: EyeglassesClient
        },
        {
          path: 'menEyeglasses',
          name: 'menEyeglasses',
          component: MenEyeglassesClient
        },
        {
          path: 'womenEyeglasses',
          name: 'womenEyeglasses',
          component: WomenEyeglassesClient
        },
        {
          path: 'kidsEyeglasses',
          name: 'kidsEyeglasses',
          component: KidsEyeglassesClient
        },
        // Sunglasses
        {
          path: 'sunglasses',
          name: 'sunglasses',
          component: SunglassesClient
        },
        {
          path: 'WomenSunglasses',
          name: 'WomenSunglasses',
          component: WomenSunglassesClient
        },
        {
          path: 'MenSunglasses',
          name: 'MenSunglasses',
          component: MenSunglassesClient
        },
        {
          path: 'kidsSunglasses',
          name: 'kidsSunglasses',
          component: KidsSunglassesClient
        },

        // Brands
        {
          path: 'allBrands',
          name: 'allBrands',
          component: allBrandsClient
        },
        {
          path: 'prada',
          name: 'prada',
          component: pradaClient
        },
        {
          path: 'rayBan',
          name: 'rayBan',
          component: rayBanClient
        },
        {
          path: 'armani',
          name: 'armani',
          component: armaniClient
        },
        // 
        {
          path: 'eyeExam',
          name: 'eyeExam',
          component: ExamClient
        },
        {
          path: 'glasses/:id/details',
          name: 'details',
          component: DetailClient
        },
        {
          path: 'PaymentFrame',
          name: 'Payment',
          component: PaymentClient
        },

        {
          path: 'lens-insertion/:glassesId', 
          name: 'LensInsertion', 
          component: LensInsertion 
        },
      ],
      meta: { layout: 'client' }
    },
  ]
})
export default router
