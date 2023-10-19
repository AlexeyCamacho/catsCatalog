<template>
    <div class="py-3">
        <div class="flex justify-end">
            <el-button type="primary" class="mb-3" @click="this.formBreedCreateModal = true; this.data.id = -1">Добавить</el-button>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
            <BreedsTable @editRow="this.editBreed"></BreedsTable>
        </div>
    </div>

    <el-dialog
        v-model="this.formBreedCreateModal"
        title="Порода"
        width="40%"
    >
        <BreedForm @save="this.formBreedCreateSubmit" @closeForm="this.formBreedCreateModal = false"></BreedForm>

    </el-dialog>

    <el-dialog
        v-model="this.formBreedEditModal"
        title="Порода"
        width="40%"
    >
        <BreedForm @save="this.formBreedEditSubmit" @closeForm="this.formBreedEditModal = false" :data="this.data"></BreedForm>
    </el-dialog>
</template>

<script>
import BreedsTable from "../components/breeds/BreedsTable.vue";
import BreedForm from "../components/forms/BreedForm.vue";

import { useBreedsStore } from '../stores/breeds'

export default {
    name: "breedsPage.vue",
    setup() {
        const breedsStore = useBreedsStore();
        return { breedsStore }
    },
    components: {
        BreedsTable,
        BreedForm
    },
    data() {
        return {
            formBreedCreateModal: false,
            formBreedEditModal: false,
            data: { id: -1 }
        }
    },
    methods: {
        formBreedCreateSubmit(form) {
            this.breedsStore.createBreed(form);
            this.formBreedCreateModal = false;
        },
        formBreedEditSubmit(form) {
            this.breedsStore.updateBreed(form);
            this.formBreedEditModal = false;
        },
        editBreed(data) {
            this.data = data;
            this.formBreedEditModal = true;
        }
    }
}
</script>

<style scoped>

</style>
