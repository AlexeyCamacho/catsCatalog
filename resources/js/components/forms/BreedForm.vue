<template>
    <el-form :model="form" label-width="120px" ref="formRef">
        <el-form-item label="Имя" prop="name" :rules="[
            { required: true, message: 'Имя обязательно' },
            { min: 3, message: 'Имя должно содержать больше 3-х символов'}
          ]">
            <el-input v-model="form.name"/>
        </el-form-item>
        <el-form-item label="Ср. прод. жизни" prop="avr_life_time">
            <el-input-number v-model="form.avr_life_time" :max="20" :min="1"/>
        </el-form-item>
        <el-form-item label="Описание" prop="desc" :rules="[
            { required: true, message: 'Описание обязательно' },
            { min: 3, message: 'Описание должно содержать больше 3-х символов'}
          ]">
            <el-input v-model="form.desc" type="textarea"/>
        </el-form-item>
        <el-form-item>
            <el-button @click="resetForm(formRef); $emit('closeForm')">Отмена</el-button>
            <el-button type="primary" @click="submitForm(formRef)">Сохранить</el-button>
        </el-form-item>
    </el-form>
</template>

<script lang="ts" setup>
import {onMounted, reactive, ref, watch} from 'vue'
import type { FormInstance } from 'element-plus'

const formRef = ref<FormInstance>();

const form = reactive({
    id: -1,
    name: '',
    avr_life_time: 1,
    desc: '',
});

const emit = defineEmits(['save', 'closeForm']);
const props = defineProps(['data']);

const submitForm = (formEl: FormInstance | undefined) => {
    if (!formEl) return
    formEl.validate((valid) => {
        if (valid) {
            emit('save', form);
            formEl.resetFields();
        } else {
            return false
        }
    })
}
const resetForm = (formEl: FormInstance | undefined) => {
    if (!formEl || form.id != -1) return
    formEl.resetFields();
}

function setForm() {
    if (props.data && props.data.id != -1) {
        form.id = props.data.id;
        form.name = props.data.name;
        form.avr_life_time = props.data.avr_life_time;
        form.desc = props.data.description;
    }
}

onMounted(() => {
    setForm();
})

watch(() => props.data, () => {
    setForm();
});
</script>


