<template>
    <el-table v-if="breeds"
        :data="breeds"
        style="width: 100%"
    >
        <el-table-column prop="breed_id" label="ID"/>
        <el-table-column prop="name" label="Name"/>
        <el-table-column prop="avr_life_time" label="AVR life time" />
        <el-table-column label="Operations">
            <template #default="scope">
                <el-button size="small" @click="handleEdit(scope.$index, scope.row)"
                >Edit</el-button
                >
                <el-button
                    size="small"
                    type="danger"
                    @click="handleDelete(scope.$index, scope.row)"
                >Delete</el-button
                >
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
import {mapState, storeToRefs} from 'pinia'
import { useBreedsStore } from '../../stores/breeds'
export default {
    name: "BreedsTable",
    setup() {
        const { breeds, loading, error } = storeToRefs(useBreedsStore());
        const { loadBreeds } = useBreedsStore();

        loadBreeds();
    },
    computed: {
        ...mapState(useBreedsStore, ['breeds'])
    }
}
</script>

<style scoped>

</style>
