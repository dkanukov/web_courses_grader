import axios from 'axios'

export const getCoursesMainPage = async function () {
    const response = await axios.get('/getCoursesMainPage?count=4');
    return response.data;
}

export const getAllCourses = async function() {
    const response = await axios.get('/getAllCourses');
    return response.data;
}
