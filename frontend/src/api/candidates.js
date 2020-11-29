import request from "./client"
const prefix = '/candidates'

export default {
    async get() {
        return request({
            'url': `${prefix}`
        })
    }
}