@extends('front.welcome')

@section('index')
    <header_index_page auth="<?php echo (auth()->check()) ? 1 : 0; ?>"
                       name="<?php $n = auth()->user()->name;echo $n[0];?>">
        <template #logout>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn-st-bg select-center set-font f-11 color-b-500" type="submit">LogOut To Profile</button>
            </form>
        </template>
    </header_index_page>
@endsection
@section('menu_right')
    <menu_right :save_file="{{$save_file}}">
        <template v-slot:send_file>
            <form action="{{route('newFile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="custom-file-input file-blue">
                    <input type="file" name="img" style="margin: 20px 0">
                </label>
                <button type="submit" class="btn-new-file-send">send</button>
            </form>
        </template>
    </menu_right>
@endsection
@section('view_file')
    <view_file
        :file_in_folder="{{$file_in_folder}}"
        :folder="{{$folders}}"
        :data="{{$files}}"
        user="{{auth()->user()->name}}"
        v-slot="slotProps">
        <form action="{{route('newFileInFolder')}}" method="post" enctype="multipart/form-data">
            @csrf
            <textarea name="folder_id" hidden>@{{ slotProps.folder_id }}</textarea>
            <label class="custom-file-input file-blue">
                <input type="file" name="img" style="margin: 20px 0">
            </label>
            <button type="submit" class="btn-new-file-send">send</button>
        </form>
    </view_file>
@endsection
@section('item_file')
@endsection
