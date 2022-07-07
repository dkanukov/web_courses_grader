import { createRouter, createWebHistory } from 'vue-router'
import MainPage from "@/views/MainPageView";
import CoursePage from "@/views/AllCoursesView";
import SettingsPage from "@/views/SettingsPageView";
import CourseView from "@/views/CourseView";
import CourseEditorView from "@/views/CourseEditorView";
import CreateCourseView from "@/views/CreateCourseView";
import HomeworkView from "@/views/HomeworkView";
import TaskView from "@/views/TaskView";

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
    path: '/CourseView/HomeworkView',
    component: HomeworkView
  },
  {
    path: '/CourseView/CourseEditorView',
    component: CourseEditorView
  },
  {
    path: '/CreateCourseView',
    component: CreateCourseView
  },
  {
    path: '/CourseView/HomeworkView/TaskView',
    component: TaskView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
