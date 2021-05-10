<template>
    <div>
        <div class="group-view-file w-100 h-100">
            <div class="item-item-file fl-right" v-for="i2 in data" :id='"menu"+i2.id'>
                <div class="view-icon-and-name obj-center-c" >
                    <i @click="cls_view" style="color: red;cursor: pointer" class="fas fa-times"></i>
                    <p style="margin: 0;padding: 10px" align="center" class="f-14 color-b-600 set-font">{{i2.name}}</p>
                    <div class="line"></div>
                    <div class="view-menu-to-profile">
                        <ul>
                            <li class="set-font color-b-600 f-13"><a :href="'/data/user/file'+'/'+user+'/'+i2.file"><span>Download </span></a> <i
                                class="fas fa-arrow-down"></i></li>
                            <li class="set-font color-b-600 f-13" style="color: green"><span>Info</span> <i
                                class="far fa-question-circle"></i></li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="view-menu-to-profile">
                        <ul>
                            <li @click="save_file(i2.id)" class="set-font color-b-600 f-13"><span>Save </span> <i class="far fa-save f-16"></i>
                            </li>
                            <li @click="delete_file(i2.id)" class="set-font color-b-600 f-13" style="color: red"><span>Delete</span> <i
                                class="far fa-trash-alt"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <div style="padding: 10px 0" class="color-b-700 set-font group-view-file" align="center">
                    <h3>Files</h3>
                    <span class="fl-right group-icon-view">
                        <img @click="view_folder_group" src="/data/icon/icon_folder.png" alt="">
                        <img @click="view_file_group" src="/data/icon/icon_file.png" alt="">
                    </span>
                </div>
                <div class="line"></div>
                <div class="all-item w-100">
                <span class="item-file-drive" v-for="i in data">
                    <img v-if="i.type == 'image/png'" src="/data/icon/icon_image.png" alt="file">
                    <img v-if="i.type == 'audio/mpeg'" src="/data/icon/icon_music.png" alt="file">
                    <div class="view-name-file">
                        <p class="set-font f-14 color-b-900" align="center">{{i.name}}</p>
                    </div>
                    <i @click="view_item_item_file(i.id)" class="fas fa-bars"></i>
                </span>
                </div>
            </div>
        </div>
        <div style="display: none" class="group-view-folder">
            <div class="color-b-700 set-font" align="center">
                <h3>Folder</h3>
                <span class="fl-right group-icon-view">
                    <img @click="view_folder_group" src="/data/icon/icon_folder.png" alt="">
                    <img @click="view_file_group" src="/data/icon/icon_file.png" alt="">
                </span>
            </div>
            <div class="line"></div>
            <div class="all-item w-100">
                <span style="cursor: pointer" class="item-file-drive"  v-for="i in folder" @click="show_page_new_file(i.id)">
                    <img src="/data/icon/folder.png" alt="folder">
                    <div class="view-name-file">
                        <p class="set-font f-14 color-b-900" align="center">{{i.name}}</p>
                    </div>
                </span>
            </div>
        </div>
    </div>
    <div class="page-view-file-in-folder page-new" >
        <p class="f-14 color-b-700 set-font" align="center">Folder <i @click="show_page_new_file_in_folder" class="far fa-plus-square fl-right f-20"></i></p>
        <div class="line"></div>
        <div v-for="i in file_in_folder">
            <div class="item-folder_in_file set-font" v-if="i.folder_id == id_folder">
                <i style="color: #1d68a7" class="fas fa-feather-alt"></i>  <span class="f-11">{{i.name}}</span>
                    <a :href="'/data/user/file'+'/'+user+'/'+i.file" download>
                        <i style="color: green" class="fas fa-arrow-down fl-right pointer"></i>
                    </a>
            </div>
        </div>
    </div>
    <div class="page-select-file-in-folder page-new" >
        <p class="f-14 color-b-700 set-font" align="center">File</p>
        <div class="line"></div>
        <slot :folder_id="id_folder"></slot>
    </div>
    <div @click="hide" class="blur"></div>
</template>

<script>
export default {
    name: "view_file",
    data:()=>({
       id_menu:0,
       id_folder:0,
    }),
    props: [
        'data',
        'user',
        'folder',
        'file_in_folder',
    ],
    methods: {
        save_file(id){
            axios.post('/save/file' , {id:id}).then((res)=>{alert(res.data)});
        },
        delete_file(id){
            axios.post('/delete/file' , {id:id}).then((res)=>{alert(res.data)});
        },
        show_page_new_file_in_folder(){
            $(".page-select-file-in-folder").show();
        },
        hide(){
            $(".page-new").hide();
            $(".blur").hide();
        },
        show_page_new_file(id){
            this.id_folder = id
            $(".page-view-file-in-folder").show();
            $(".blur").show();
        },
        view_item_item_file(id) {
            this.id_menu = id;
            $('#menu'+id).slideDown();
        },
        cls_view() {
            $('.item-item-file').slideUp();
        },
        view_folder_group() {
            $('.group-view-file').stop().fadeOut();
            $('.group-view-folder').stop().fadeIn();
        },
        view_file_group() {
            $('.group-view-file').stop().fadeIn();
            $('.group-view-folder').stop().fadeOut();
        }
    },
}
</script>

<style scoped>

</style>
