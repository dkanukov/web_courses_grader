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
