import { defineStore } from 'pinia'
import ApiService from '../API/breeds.js';
import { ElNotification } from 'element-plus'

export const useBreedsStore = defineStore('breeds',{
    id: 'breed',
    state: () => ({
        breeds: [],
        breed: null,
        loading: false,
        error: null
    }),
    getters: {
        getBreedsSortByName() {
            this.breeds.sort((a, b) => {
                const nameA = a.name.toUpperCase(); // ignore upper and lowercase
                const nameB = b.name.toUpperCase(); // ignore upper and lowercase
                if (nameA < nameB) {
                    return -1;
                }
                if (nameA > nameB) {
                    return 1;
                }
            });
            return this.breeds;
        }
    },
    actions: {
        async loadBreeds() {
            this.breeds = []
            this.loading = true
            try {
                this.breeds = await ApiService.getAllBreeds()
                    .then((response) => response.data)
            } catch (error) {
                this.error = error
                ElNotification.error({
                    title: 'Ошибка',
                    message: 'Ошибка при загрузке пород'
                })
            } finally {
                this.loading = false
            }
        },
        async createBreed(data) {
            try {
                await ApiService.createBreed(data)
                    .then((response) => {
                        this.breeds.push(response.data)
                    })
            } catch (error) {
                this.error = error
                ElNotification.error({
                    title: 'Ошибка',
                    message: 'Ошибка при добавлении породы'
                })
            }
        },
        async updateBreed(data) {
            try {
                await ApiService.updateBreed(data)
                    .then((response) => {
                        let breed = response.data;
                        let index = this.breeds.map(x => {
                            return x.id;
                        }).indexOf(data.id);

                        this.breeds[index] = breed;

                        ElNotification.success({
                            title: 'Успех',
                            message: 'Порода сохранена'
                        })
                    })
            } catch (error) {
                this.error = error
                ElNotification.error({
                    title: 'Ошибка',
                    message: 'Ошибка при обновлении породы'
                })
            }
        },
        async deleteBreed(breedID) {
            try {
                await ApiService.deleteBreed(breedID)
                    .then((response) =>  {
                        let index = this.breeds.map(x => {
                            return x.id;
                        }).indexOf(breedID);

                        this.breeds.splice(index, 1);

                        ElNotification.success({
                            title: 'Успех',
                            message: 'Порода успешно удалена'
                        })
                    } )
            } catch (error) {
                this.error = error
                ElNotification.error({
                    title: 'Ошибка',
                    message: 'Ошибка при удалении породы'
                })
            }
        },
    }
})
