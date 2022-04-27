export default {
    actions: {

    },
    mutations: {
        pushCourseInfo(state, data) {
            state.courseInfo.courseName = data.courseName;
            state.courseInfo.courseStatus = data.courseStatus;
            state.courseInfo.courseType = data.courseType;
        }
    },
    state: {
        courseInfo: {
            courseName: "",
            courseStatus: "",
            courseType: ""
        }
    },
    getters: {
        getCourseInfo(state) {
            return state.courseInfo;
        }
    }
}
