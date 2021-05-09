@extends('front.welcome')

@section('index')
    <header_index_page auth="<?php echo (auth()->check()) ? 1 : 0; ?>" name="<?php $n= auth()->user()->name;echo $n[0];?>"></header_index_page>
@endsection
@section('menu_right')
    <menu_right>
        <template v-slot:send_file>
            <form action="{{route('newFile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label  class="custom-file-input file-blue">
                    <input type="file" name="img" style="margin: 20px 0">
                </label>
                <button type="submit" class="btn-new-file-send">send</button>
            </form>
        </template>
    </menu_right>
@endsection
@section('view_file')
    <view_file :folder="{{$folders}}" :data="{{$files}}" user="{{auth()->user()->name}}"></view_file>
@endsection
@section('item_file')
@endsection
