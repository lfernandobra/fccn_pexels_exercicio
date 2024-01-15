import axios from "axios";

// 13058304/json/

const api = axios.create({
    baseURL: "https://viacep.com.br/ws/"
})

export default api;