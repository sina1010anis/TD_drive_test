<template>
    <div>
        <div class="group-view-file w-100 h-100">
            <div class="item-item-file fl-right">
                <div class="view-icon-and-name obj-center-c">
                    <i @click="cls_view" style="color: red;cursor: pointer" class="fas fa-times"></i>
                    <p style="margin: 0;padding: 10px" align="center" class="f-14 color-b-600 set-font">Test.jpg</p>
                    <div class="line"></div>
                    <div class="view-menu-to-profile">
                        <ul>
                            <li class="set-font color-b-600 f-13"><span>Download </span> <i class="fas fa-arrow-down"></i> </li>
                            <li class="set-font color-b-600 f-13" style="color: green"><span>Info</span>  <i class="far fa-question-circle"></i> </li>
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div class="view-menu-to-profile">
                        <ul>
                            <li class="set-font color-b-600 f-13"><span>Save </span> <i class="far fa-save f-16"></i> </li>
                            <li class="set-font color-b-600 f-13" style="color: red"><span>Delete</span>  <i class="far fa-trash-alt"></i> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="padding: 10px 0" class="color-b-700 set-font" align="center"><h3>Files</h3></div>
            <div class="line"></div>
            <div class="all-item w-100">
                <span class="item-file-drive">
                    <img src="/data/icon/icon_image.png" alt="">
                    <div class="view-name-file">
                        <p class="set-font f-14 color-b-900" align="center">Test.jpg</p>
                    </div>
                    <i @click="view_item_item_file" class="fas fa-bars"></i>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "view_file",
    methods:{
        view_item_item_file(){
            $('.item-item-file').slideDown();
        },
        cls_view(){
            $('.item-item-file').slideUp();
        }
    }
}
</script>

<style scoped>

</style>
