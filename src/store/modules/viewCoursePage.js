export default {
    actions: {

    },
    mutations: {
        pushCourseInfo(state, data) {
            state.courseInfo.courseName = data.courseName;
            state.courseInfo.courseStatus = data.courseStatus;
            state.courseInfo.courseGroupsNum = data.courseGroupsNum;
        }
    },
    state: {
        courseInfo: {
            courseName: "",
            courseStatus: "",
            courseGroupsNum: 0
        }
    },
    getters: {
        getCourseInfo(state) {
            return state.courseInfo;
        }
    }
}