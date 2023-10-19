let path = '/api/breeds'
import axios from 'axios'

export default {
    async getAllBreeds() {
        return axios.get(`${path}`);
    },
    async createBreed(data) {
        return axios.post(`${path}/`, data);
    },
    async updateBreed(data) {
        return axios.put(`${path}/` + data.id, data);
    },
    async deleteBreed(breedID) {
        return axios.delete(`${path}/` + breedID);
    },
}
