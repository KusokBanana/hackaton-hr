import request from "./client"
const prefix = '/vacancies'

export default {
    async get() {
        return request({
            'url': `${prefix}`
        })
    }
}