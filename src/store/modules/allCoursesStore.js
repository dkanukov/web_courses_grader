import {getAllCourses} from "@/services/fetchers";
export default {
    actions:{
        async getCourses(ctx) {
            const res = await getAllCourses();
            ctx.commit("updateCourses", res);
        }
    },
    mutations:{
        updateCourses(state, courses) {
            state.courses = courses;
        }
    },
    state:{
        courses: {}
    },
    getters: {
        allCourses(state) {
            return state.courses;
        }
    }
}
