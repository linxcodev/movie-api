import Home from  '../views/Home.vue'
import kategori from '../views/Kategori.vue'

export default [
    {
        path: '/',
        name: 'home',
        component: Home,
        // meta: { requiresAuth: true }
    },
    {
        path: '/kategori',
        name: 'kategori',
        component: kategori,
        // meta: { requiresAuth: true }
    },
]