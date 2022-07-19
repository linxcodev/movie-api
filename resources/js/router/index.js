import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

import movie from './movie'

Vue.use(VueRouter)

const routes = [
  ...movie
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from , next) => {
  store.commit('CLEAR_ERRORS')
  store.commit('LOADING_PAGE', true)
  next()

  // if (to.matched.some(record => record.meta.requiresAuth)) {
  //   let auth = store.getters.isAuth
  //   if (!auth) {
  //     next({ name: 'login' })
  //   }
  //   else {
  //     store.commit('LOADING_PAGE', true)
  //     next()
  //   }
  // }
  // else {
  //   store.commit('LOADING_PAGE', true)
  //   next()
  // }
})


router.afterEach((to) => {
  store.commit('LOADING_PAGE', false)
  store.commit('SET_LOADING', false)

  Vue.nextTick(() => {
    document.title = 'Page' + ((to.meta.title) ? ' - ' + to.meta.title : '')
  });
})

export default router