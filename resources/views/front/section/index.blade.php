@extends('front.welcome')

@section('index')
    <header_index_page auth="<?php echo (auth()->check()) ? 1 : 0; ?>"></header_index_page>
@endsection
