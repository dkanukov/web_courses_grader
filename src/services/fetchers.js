import axios from 'axios'

export const getCoursesMainPage = async function (){
    const response = await axios.get('/getCoursesMainPage');
    return response.data;
}
