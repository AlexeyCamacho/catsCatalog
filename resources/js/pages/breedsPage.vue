<template>
    <div class="py-3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3">
            <BreedsTable></BreedsTable>
        </div>
    </div>
</template>

<script>
import BreedsTable from "../components/breeds/BreedsTable.vue";
export default {
    name: "breedsPage.vue",
    components: {
        BreedsTable
    }
}
</script>

<style scoped>

</style>
