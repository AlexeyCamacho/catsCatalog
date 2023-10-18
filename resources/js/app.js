import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Toast from "vue-toastification"

import "vue-toastification/dist/index.css";

const app = createApp(App)

app.use(router).use(VueAxios, axios).use(createPinia()).use(ElementPlus)
    .use(Toast,{
        timeout: 3000
    })

router.isReady().then(() => {
    app.mount('#app')
})
