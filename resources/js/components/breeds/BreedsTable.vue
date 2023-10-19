<template>
    <el-table v-if="breedsStore.getBreedsSortByName"
        :data="breedsStore.getBreedsSortByName"
        style="width: 100%"
    >
        <el-table-column prop="breed_id" label="ID"/>
        <el-table-column prop="name" label="Название"/>
        <el-table-column prop="avr_life_time" label="Сред. прод. жизни" />
        <el-table-column prop="description" label="Описание" :formatter="(row, column, cellValue) => this.truncateString(cellValue, 60)"/>
        <el-table-column label="Действия">
            <template #default="scope">
                <el-button size="small" @click="$emit('editRow', scope.row);"
                >Редактировать</el-button
                >
                <el-popconfirm title="Are you sure to delete this?" @confirm="this.breedsStore.deleteBreed(scope.row.id)">
                    <template #reference>
                        <el-button
                            size="small"
                            type="danger"
                        >Удалить</el-button>
                    </template>
                </el-popconfirm>
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
import { useBreedsStore } from '../../stores/breeds'
export default {
    name: "BreedsTable",
    setup() {
        const breedsStore = useBreedsStore();
        const truncateString = (s, w) => s.length > w ? s.slice(0, w) + "..." : s;

        return { breedsStore, truncateString }
    },
    mounted() {
        this.breedsStore.loadBreeds();
    },
}
</script>

<style scoped>

</style>
