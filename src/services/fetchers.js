import axios from 'axios'

export const getAllCourses = async function() {
    const response = await axios.get('/getAllCourses');
    return response.data;
}
