<?php


namespace App\View;


class save_file
{
    public function compose(\Illuminate\View\View $view)
    {
        if (auth()->check()){
            return $view->with('save_file', \App\Models\save_file::orderBy('id', 'desc')->whereUser_id(auth()->user()->id)->get());
        }
    }
}
