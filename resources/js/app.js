require('./bootstrap');
import '../css/app.css'
import '../css/style.css'
import $ from 'jquery'
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import header_index_page from "./components/header_index_page"
const app = createApp({
    data:()=>({
        test:'test',
    }),
    components:{
        header_index_page
    }
})
app.mount('#app');
