<template>
    <div>
        <span class="btn-new-file fl-right w-100">
                <button @mouseover="view_menu_profile" @mouseout="view_menu_profile_exit"
                        class="btn-new-file-btn w-100">
                    <span class="set-font f-18 color-b-700">New</span>
                    <img src="/data/icon/plus.png" alt="">
                </button>
        </span>
        <div class="menu-ul">
            <ul>
                <li class="w-100 set-font color-b-600 f-12">My Drive <i class="far fa-user"></i></li>
                <li class="w-100 set-font color-b-600 f-12">My Send <i class="far fa-share-square"></i></li>
                <li class="w-100 set-font color-b-600 f-12">News file <i class="far fa-clock"></i></li>
                <li @click="view_page_save_file" class="w-100 set-font color-b-600 f-12">Save <i class="far fa-save"></i></li>
            </ul>
        </div>
        <div class="line"></div>
    </div>
    <div @mouseover="view_menu_profile" @mouseout="view_menu_profile_exit" class="menu-profile-new fl-right">
        <div class="view-icon-and-name obj-center-c">
            <img src="/data/icon/profile.png" alt="">
            <p style="margin: 0;padding: 10px" align="center" class="f-14 color-b-600 set-font">Sina Na</p>
            <span align="center" class="f-12 color-b-500 set-font">sina1010anis@gmail.com</span>
            <div class="line"></div>
            <div class="view-menu-to-profile">
                <ul>
                    <li @click="show_page_new_file" class="set-font color-b-600 f-13"><span>New File </span> <i
                        class="far fa-plus-square f-16"></i></li>
                    <li @click="show_page_new_folder" class="set-font color-b-600 f-13"><span>New Folder</span> <i
                        class="far fa-folder"></i></li>
                </ul>
            </div>
            <div class="line"></div>
        </div>
    </div>
    <div class="page-new-file page-new">
        <p class="f-14 color-b-700 set-font" align="center">New File</p>
        <div class="line"></div>
        <slot name="send_file"/>
    </div>
    <div class="page-new-folder page-new">
        <p class="f-14 color-b-700 set-font" align="center">New Folder</p>
        <div class="line"></div>
        <input class="input-back" type="text" v-model="name_folder">
        <button @click="set_new_folder" class="btn-new-file-send">send</button>
    </div>
    <div class="page-view-save-file page-new">
        <p class="f-14 color-b-700 set-font" align="center">File Save</p>
        <div class="line"></div>
        <div v-for="i in save_file">
            <div class="item-folder_in_file set-font">
                <i style="color: #1d68a7" class="fas fa-feather-alt"></i>  <span class="f-11">{{i.file_id}}</span>
            </div>
        </div>
    </div>
    <div @click="hide" class="blur"></div>
</template>

<script>
export default {
    name: "menu_right",
    data: () => ({
        name_folder: '',
    }),
    props: [
        'auth',
        'csrf',
        'save_file',
    ],
    methods: {
        set_new_folder() {
            if (this.name_folder != '') {
                axios.post('/new/folder', {name: this.name_folder}).then((res) => {
                    if (res.data == 'ok') {
                        alert('ok')
                        $(".page-new-folder").hide();
                        $(".blur").hide();
                    }if (res.data == 'err'){
                        alert('Is a duplicate name')
                    }
                });
            }
        },
        show_page_new_folder() {
            $(".page-new-folder").show();
            $(".blur").show();
        },
        view_page_save_file(){
            $(".page-view-save-file").show();
            $(".blur").show();
        },
        hide() {
            $(".page-new").hide();
            $(".blur").hide();
        },
        show_page_new_file() {
            $(".page-new-file").show();
            $(".blur").show();
        },
        send_file() {
            const file = new FormData();
            file.append('img', this.ImageData);
            axios.post('/new/file', file).then(alert('ok'));
        },
        test() {
            alert('test')
        },
        view_menu_profile() {
            $(".menu-profile-new").stop().slideToggle(200)
        },
        view_menu_profile_exit() {
            $(".menu-profile-new").stop().slideToggle(200)
        }
    }
}
</script>

<style scoped>

</style>
