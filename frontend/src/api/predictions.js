import Axios from "axios";
const appurl="http://130.193.46.118:6969"

export default {
    async predict(prompt) {
        let params = {}
        params.url = `${appurl}`
        params.params = {
            prompt: prompt
        }
        return Axios(params)
    }
};
