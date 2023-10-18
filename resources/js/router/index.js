import { createRouter, createWebHistory } from 'vue-router'
import cats from "./cats";

const baseRoutes = []

const routes = baseRoutes.concat(
    cats,
)

const router = createRouter({
    history: createWebHistory(),
    scrollBehavior() {
        return { top: 0 }
    },
    routes
})

export default router
