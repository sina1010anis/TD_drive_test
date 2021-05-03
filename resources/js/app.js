require('./bootstrap');
import '../css/app.css'
import '../css/style.css'
import $ from 'jquery'
import axios from 'axios'
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import header_index_page from "./components/header_index_page"
import menu_right from "./components/menu_right"
import view_file from "./components/view_file"
const app = createApp({
    data:()=>({
        test:'test',
    }),
    components:{
        header_index_page,
        menu_right,
        view_file
    },
    methods:{
        ts(){
          alert('test')
        },
        cls_page_suc(){
            $('.view-suc').slideToggle();
        },
    }
})
app.mount('#app');
