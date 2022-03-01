import { createRouter, createWebHistory } from 'vue-router'
import MainPage from "@/views/MainPage";
import CoursePage from "@/views/CoursePage";

const routes = [
  {
    path: '/',
    component: MainPage
  },
  {
    path: '/CoursePage',
    component: CoursePage
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
