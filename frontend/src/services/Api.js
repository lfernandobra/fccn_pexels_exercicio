import axios from 'axios';

const URL = 'http://localhost:8000/api/get-videos';

const getVideos = (query, locale, size) => {
    const params = {
        query: query,
        locale: locale.value,
        size: size.value
    }

    return axios.get(URL, { params });
};

export default getVideos;
