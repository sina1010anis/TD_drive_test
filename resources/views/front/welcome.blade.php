<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cloud</title>
    <link rel="shortcut icon" href="{{url('data/icon/3813347461559033170-128 (1).png')}}">
    <script src="https://kit.fontawesome.com/d4c29863c5.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="shit">
    <div id="row">
        <div id="app">
            @if(session('msg_suc'))
                <span class="view-suc set-font">
                    <i v-on="{click:cls_page_suc}" class="fas fa-times cls-page-suc"></i>
                    {{session('msg_suc')}}
                </span>
            @endif
            @yield('index')
            <div class="group-view-opt">
                <span class="view-menu-right h-100 fl-right">
                    @yield('menu_right')
                </span>
                <span class="view-file h-100 fl-right">
                    @yield('view_file')
                </span>
            </div>
        </div>
    </div>
</div>
<script src="{{url('/js/app.js')}}"></script>
</body>
</html>
