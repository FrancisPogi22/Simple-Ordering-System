import { createRouter, createWebHashHistory } from 'vue-router'
import LoginPage from '../components/LoginPage.vue'
import RegisterPage from '../components/RegisterPage.vue'
import HomePage from '../components/HomePage.vue'
import StorePage from '../components/StorePage.vue'
import CartPage from '../components/CartPage.vue'
import OrderPage from '../components/OrderPage.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginPage
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterPage
  },
  {
    path: '/dashboard', component: HomePage, name: 'home',
    beforeEnter: (to, from, next) => {
      if (localStorage.getItem('token')) {
        next()
      } else {
        next('/')
      }
    }
  },
  {
    path: '/myStore', component: StorePage, name: 'myStore',
    beforeEnter: (to, from, next) => {
      if (localStorage.getItem('token') && localStorage.getItem('account_type') == 1) {
        next()
      } else {
        next('/')
      }
    }
  },
  {
    path: '/myCart', component: CartPage, name: 'myCart',
    beforeEnter: (to, from, next) => {
      if (localStorage.getItem('token') && localStorage.getItem('account_type') == 2) {
        next()
      } else {
        next('/')
      }
    }
  },
  {
    path: '/myOrder', component: OrderPage, name: 'myOrder',
    beforeEnter: (to, from, next) => {
      if (localStorage.getItem('token') && localStorage.getItem('account_type') == 2) {
        next()
      } else {
        next('/')
      }
    }
  },
  {
    path: '/logout',
    name: 'logout',
    component: LoginPage,
    beforeEnter: (to, from, next) => {
      localStorage.removeItem('token');
      localStorage.removeItem('user_id');
      localStorage.removeItem('account_type');
      next('/');
    }
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
