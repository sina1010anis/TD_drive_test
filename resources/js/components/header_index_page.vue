<template>
    <header>
        <span class="pt-1-header-index w-15 h100 fl-right">
            <a href="./">
                <img src="/data/icon/3813347461559033170-128%20(1).png" alt="Home" title="Home" class="fl-right logo-header"><span class="fl-right set-font f-20 color-b-500">Cloud</span>
            </a>
        </span>
        <span class="pt-2-header-index w-50 h100 fl-right">
            <img class="search-icon" src="/data/icon/search.png" alt="">
            <input type="text" class="input-search-file set-font f-14" placeholder="Search File" align="right">
        </span>
        <span class="pt-3-header-index h100 fl-right">
            <span @mouseover="view_menu_profile" @mouseout="view_menu_profile_exit" v-if="auth == 1" class="view-profile set-font fl-left">{{name}}</span>
            <span v-else class="view-profile set-font fl-left not-auth">?</span>
            <span class="view-item-menu fl-left obj-center ic-1">
                <img src="/data/icon/menu.png" alt="">
            </span>
            <span class="view-item-menu fl-left obj-center ic-2">
                <img src="/data/icon/setting.png" alt="">
            </span>
            <span class="view-item-menu fl-left obj-center ic-3">
                <img src="/data/icon/info.png" alt="">
            </span>
        </span>
        <div @mouseover="view_menu_profile" @mouseout="view_menu_profile_exit" class="menu-profile fl-left">
            <div class="view-icon-and-name obj-center-c">
                <img src="/data/icon/profile.png" alt="">
                <p style="margin: 0;padding: 10px" align="center" class="f-14 color-b-600 set-font">Sina Na</p>
                <span align="center" class="f-12 color-b-500 set-font">sina1010anis@gmail.com</span>
                <div class="line"></div>
                <div class="view-menu-to-profile">
                    <ul>
                        <li class="set-font color-b-600 f-13"><span>New File </span> <i class="far fa-plus-square f-16"></i> </li>
                        <li class="set-font color-b-600 f-13"><span>Setting</span>  <i class="fas fa-cog f-16"></i> </li>
                        <li class="set-font color-b-600 f-13"><span>Apps</span> <i class="fas fa-shapes f-16"></i>  </li>
                        <li class="set-font color-b-600 f-13"><span>Info</span> <i class="far fa-question-circle f-16"></i> </li>
                    </ul>
                </div>
                <div class="line"></div>
                <div style="position: relative;margin: 20px 0" class="group-btn-logout obj-center">
                    <button @click="logout" class="btn-st-bg select-center set-font f-11 color-b-500" type="submit">LogOut To Profile</button>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: "header_index_page",
    props:[
        'auth',
        'name',
    ],
    methods:{
        logout(){
            axios.post('/logout');
        },
        test(){
            alert('test')
        },
        view_menu_profile(){
            $(".menu-profile").stop().slideToggle(200)
        },
        view_menu_profile_exit(){
            $(".menu-profile").stop().slideToggle(200)
        }
    }
}
</script>
