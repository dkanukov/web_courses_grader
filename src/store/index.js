import { createStore } from 'vuex'
import viewCoursePage from "@/store/modules/viewCoursePage";
import allCoursesStore from "@/store/modules/allCoursesStore"
export default createStore({
  modules: {
    viewCoursePage,
    allCoursesStore
  }
})
