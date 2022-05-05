import { rest } from 'msw'

export default [
    rest.get('/message', (req, res, ctx) => {
        return res(
            ctx.json({
                message: 'it works'
            })
        )
    }),
    rest.get('/getCoursesMainPage', (req, res, ctx) => {
        return res(
            ctx.json(
                [
                    {index: 1, name: "Test11", status: "inAction", type: "open"},
                    {index: 2, name: "Test22", status: "closed", type: "open"},
                    {index: 3, name: "Test33", status: "inAction", type: "closed"},
                    {index: 4, name: "Test44", status: "inDev", type: "closed"}
                ]
            )
        )
    })
]
