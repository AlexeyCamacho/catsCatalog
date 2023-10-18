import { createRouter, createWebHistory } from 'vue-router'
import cats from "./cats";
import breeds from "./breeds";

const baseRoutes = []

const routes = baseRoutes.concat(
    cats,
    breeds
)

const router = createRouter({
    history: createWebHistory(),
    scrollBehavior() {
        return { top: 0 }
    },
    routes
})

export default router
