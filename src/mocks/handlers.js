import { rest } from 'msw';

const allCourses = [
    {id: 1, name: "Test1", status: "inAction", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 2, name: "Test2", status: "closed", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 3, name: "Test3", status: "inAction", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 4, name: "Test4", status: "inDev", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 5, name: "Test5", status: "inAction", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 6, name: "Test6", status: "closed", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 7, name: "Test7", status: "inAction", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 8, name: "Test8", status: "inDev", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 9, name: "Test9", status: "inAction", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 10, name: "Test10", status: "closed", type: "open", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 11, name: "Test11", status: "inAction", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
    {id: 12, name: "Test12", status: "inDev", type: "closed", description: "Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно"},
];

const users = [
    {id: 1, name: "name1", surname: "surname1", email: "test@example.com", coursesId: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], password: "password1"},
]

const coursesModulesTasks = [
    {id: 1, userId: 1, courseId: 1, tasks: [
            {id: 1, moduleName: "Module1", tasks:[
                    {taskId: 1, taskName: "Task1", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 2, taskName: "Task2", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 3, taskName: "Task3", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 4, taskName: "Task4", testFiles: [], extraFiles:[], taskText: ""},
                ]},
            {id: 2, moduleName: "Module2",tasks:[
                    {taskId: 5, taskName: "Task5", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 6, taskName: "Task6", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 7, taskName: "Task7", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 8, taskName: "Task8", testFiles: [], extraFiles:[], taskText: ""},
                ]},
            {id: 3, moduleName: "Module3", tasks:[
                    {taskId: 9, taskName: "Task9", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 10, taskName: "Task10", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 11, taskName: "Task11", testFiles: [], extraFiles:[], taskText: ""},
                    {taskId: 12, taskName: "Task12", testFiles: [], extraFiles:[], taskText: ""},
                ]},
            {id: 4, moduleName: "Module4", tasks: []},
            {id: 5, moduleName: "Module5", tasks: []},
        ]},
    {id: 2, userId: 1, courseId: 9, tasks: []},
    {id: 3, userId: 1, courseId: 8, tasks: []},
    {id: 4, userId: 1, courseId: 7, tasks: []},
    {id: 5, userId: 1, courseId: 6, tasks: []},
    {id: 6, userId: 1, courseId: 5, tasks: []},
    {id: 7, userId: 1, courseId: 4, tasks: []},
    {id: 8, userId: 1, courseId: 3, tasks: []},
    {id: 9, userId: 1, courseId: 2, tasks: []}
]

export default [
    rest.get('/getTasksByCourseId', (req, res, ctx) => {
       const courseId = req.url.searchParams.get('id');
       const result = coursesModulesTasks.find((element) => element.courseId===parseInt(courseId));
       return res(
           ctx.json(result)
       )
    }),
    rest.get('/getAllCourses', (req, res, ctx) => {
        return res(
            ctx.json(allCourses)
        )
    }),
    rest.get('/getCourseByCourseId', (req, res, ctx) => {
        const courseId = req.url.searchParams.get('id');
        const result = allCourses.find(element => element.id === parseInt(courseId));
        return res (
            ctx.json(result)
        )
    }),
    rest.get('/getUserById', (req, res, ctx) => {
        const userId = req.url.searchParams.get('id');
        const result = users.find(element => element.id === parseInt(userId));
        return res (
            ctx.json(result)
        )
    })
]
