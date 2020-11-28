import Axios from "axios";
const appurl="http://130.193.46.118:8000"

const request = async (params) => {
    params.url = appurl + params.url
    return Axios(params)
}

export default request;
