import { createRouter, createWebHistory } from 'vue-router'
import MainPage from "@/views/MainPage";
import CoursePage from "@/views/CoursePage";
import SettingsPage from "@/views/SettingsPage";
import CourseView from "@/views/CourseView";
import AddHomework from "@/views/AddHomework";

const routes = [
  {
    path: '/',
    component: MainPage
  },
  {
    path: '/CoursePage',
    component: CoursePage
  },
  {
    path: '/SettingsPage',
    component: SettingsPage
  },
  {
    path: '/CourseView',
    component: CourseView
  },
  {
    path: '/CourseView/AddHomework',
    component: AddHomework
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
