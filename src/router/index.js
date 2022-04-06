import { createRouter, createWebHistory } from 'vue-router'
import MainPage from "@/views/MainPageView";
import CoursePage from "@/views/CoursePageView";
import SettingsPage from "@/views/SettingsPageView";
import CourseView from "@/views/CourseView";
import AddHomework from "@/views/AddHomeworkView";

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
