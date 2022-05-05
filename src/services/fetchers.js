import axios from 'axios'

export const getCoursesMainPage = async function (){
    const response = await axios.get('/getCoursesMainPage')
    return response.data
}


export const fetchMessage = async function (){
    const response = await axios.get('/message')
    return response.data.message
}
