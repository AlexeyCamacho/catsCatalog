let path = '/api/breeds'
import axios from 'axios'

export default {
    async getAllBreeds() {
        return axios.get(`${path}`);
    },
}
