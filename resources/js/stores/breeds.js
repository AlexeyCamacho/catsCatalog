import { defineStore } from 'pinia'
import ApiService from '../API/breeds.js';
import { useToast } from 'vue-toastification';
const toast = useToast();

export const useBreedsStore = defineStore('breeds',{
    id: 'breed',
    state: () => ({
        breeds: [],
        breed: null,
        loading: false,
        error: null
    }),
    actions: {
        async loadBreeds() {
            this.breeds = []
            this.loading = true
            try {
                this.breeds = await ApiService.getAllBreeds()
                    .then((response) => response.data)
            } catch (error) {
                this.error = error
                toast.error('Ошибка загрузки пород');
                console.log(this.error);
            } finally {
                this.loading = false
            }
        },
    }
})
