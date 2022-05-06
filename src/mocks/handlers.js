import { rest } from 'msw';

const allCourses = [
    {index: 1, name: "Test1", status: "inAction", type: "open"},
    {index: 2, name: "Test2", status: "closed", type: "open"},
    {index: 3, name: "Test3", status: "inAction", type: "closed"},
    {index: 4, name: "Test4", status: "inDev", type: "closed"},
    {index: 5, name: "Test5", status: "inAction", type: "open"},
    {index: 6, name: "Test6", status: "closed", type: "open"},
    {index: 7, name: "Test7", status: "inAction", type: "closed"},
    {index: 8, name: "Test8", status: "inDev", type: "closed"},
    {index: 9, name: "Test9", status: "inAction", type: "open"},
    {index: 10, name: "Test10", status: "closed", type: "open"},
    {index: 11, name: "Test11", status: "inAction", type: "closed"},
    {index: 12, name: "Test12", status: "inDev", type: "closed"},
];

export default [
    rest.get('/getCoursesMainPage', (req, res, ctx) => {
        return res(
            ctx.json(allCourses.slice(0,4))
        )
    }),
    rest.get('/getAllCourses', (req, res, ctx) => {
        return res(
            ctx.json(allCourses)
        )
    })
]
