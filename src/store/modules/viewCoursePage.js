export default {
    actions: {

    },
    mutations: {
        pushCourseInfo(state, data) {
            state.courseInfo.courseName = data.courseName;
            state.courseInfo.courseStatus = data.courseStatus;
            state.courseInfo.courseType = data.courseType;
            state.courseInfo.courseDescr = data.courseDescr;
        }
    },
    state: {
        courseInfo: {
            courseName: "",
            courseStatus: "",
            courseType: "",
            courseDescr: ""
        }
    },
    getters: {
        getCourseInfo(state) {
            return state.courseInfo;
        }
    }
}
