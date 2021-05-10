<?php


namespace App\View;


class file_in_folder
{
    public function compose(\Illuminate\View\View $view)
    {
        return $view->with('file_in_folder' , \App\Models\file_in_folder::orderBy('id' , 'desc')->get());
    }
}
