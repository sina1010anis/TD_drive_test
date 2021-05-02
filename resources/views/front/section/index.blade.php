@extends('front.welcome')

@section('index')
    <header_index_page auth="<?php echo (auth()->check()) ? 1 : 0; ?>"></header_index_page>
@endsection
@section('menu_right')
    <menu_right></menu_right>
@endsection
@section('view_file')
    <view_file></view_file>
@endsection
@section('item_file')
    <p>item_file</p>
@endsection
