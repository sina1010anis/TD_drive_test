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
            <span  class="view-profile set-font fl-left">H</span>
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
    </header>
</template>

<script>
export default {
    name: "header_index_page",
    props:[
        'color'
    ]
}
</script>
