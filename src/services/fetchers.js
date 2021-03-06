import axios from 'axios'

export const getAllCourses = async function() {
    const response = await axios.get('/getAllCourses');
    return response.data;
}

export const getCourseByCourseId = async function(id) {
    const response = await axios.get('/getCourseByCourseId?id=' + id);
    return response.data;
}

export const getUserById = async function(id) {
    const response = await axios.get('/getUserById?id=' + id);
    return response.data;
}

export const getTasksByCourseId = async function(id) {
    const response = await axios.get('/getTasksByCourseId?id=' + id);
    return response.data;
}

export const getTaskDataByTaskId = async function(userId, courseId, taskId) {
    const response = await axios.get('/getTaskDataByTaskId?userId=' + userId+ "&courseId=" + courseId + "&taskId=" + taskId);
    return response.data;
}
